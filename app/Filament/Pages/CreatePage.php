<?php

namespace App\Filament\Pages;

use App\Events\PageCreatedEvent;
use App\Filament\Concerns\HeroImageSectionConcern;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\DB;

class CreatePage extends Page
{
    use InteractsWithActions;

    use HeroImageSectionConcern;


    public $page_title;

    public $page_slug;

    public  $is_front_page;
    public $meta_title;
    public $meta_description;

    public $sections;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.create-page';

    protected static bool $shouldRegisterNavigation = false;


    public function submitAction()
    {

        return \Filament\Actions\Action::make('Submit')

            ->action(function () {

                $data = $this->form->getState();

                try {

                    DB::beginTransaction();


                    /** @var \App\Models\Page $page */
                    $page = \App\Models\Page::create([
                        'title' => $data['page_title'],
                        'meta_title' => $data['meta_title'],
                        'meta_description' => $data['meta_description'],
                        'is_published' => true,
                        'is_front_page' => ($data['is_front_page']) ?? false,

                    ]);

                    $page->link()->create([
                        'slug' => $data['page_slug'],
                        'type' => 'page',
                    ]);

                    foreach ($data['sections'] as $section) {

                        $page->sections()->create([
                            'type' => $section['type'],
                            'extra' => $section['data'],
                        ]);

                    }

                    DB::commit();

                    //event(new PageCreatedEvent($page));

                    Notification::make('success')
                        ->success()
                        ->body('page saved successfully')
                        ->send();

                } catch (Halt $exception) {
                    DB::rollBack();
                    Notification::make('error')
                        ->danger()
                        ->body('page saved successfully')
                        ->send();
                }
            });
    }


    public  function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    TextInput::make('page_title')->reactive()
                        ->afterStateUpdated(fn (Set $set, $state): string =>  $set('page_slug', str($state)->slug()))
                        ->required()->unique(
                            column: 'title',
                            ignoreRecord: true,
                        ),
                    TextInput::make('page_slug')

                        ->required(),

                    Checkbox::make('is_front_page')
                        ->label(fn (): string => \App\Models\Page::query()->where('is_front_page', true)->count() ? 'Front Page' : 'Is front Page')
                        ->disabled(fn (): bool => \App\Models\Page::query()->where('is_front_page', true)->count()),
                    TextInput::make('meta_title')->required()->unique(ignoreRecord: true),
                    TextInput::make('meta_description')->unique(ignoreRecord: true),

                ]),

                Builder::make('sections')->label('Page Sections')
                    ->blocks([

                        $this->heroWithService(),
                        $this->heroPageBuilder(),
                        $this->fullImageWidthSection(),
                        $this->headerSection(),
                        $this->cardSection(),
                        $this->testimonialsSection(),
                        $this->sliderSection(),
                    ])
                    ->columns(3)
                    ->collapsed()
                    ->collapsible(),

            ])
            ->columns(1);
    }


}
