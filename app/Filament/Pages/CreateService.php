<?php

namespace App\Filament\Pages;

use App\Events\PageCreatedEvent;
use App\Filament\Concerns\HeroImageSectionConcern;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\DB;

class CreateService extends Page
{
    use InteractsWithActions;

    use HeroImageSectionConcern;


    public $page_title;

    public $page_slug;

    public  $is_front_page;
    public $featured_image;
    public $meta_title;
    public $meta_description;

    public $sections;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.create-service';

    protected static bool $shouldRegisterNavigation = false;


    public function submitAction()
    {

        return \Filament\Actions\Action::make('Submit')

            ->action(function () {

                $data = $this->form->getState();

                try {

                    DB::beginTransaction();


                    /** @var \App\Models\Service $page */
                    $page = \App\Models\Service::create([
                        'title' => $data['page_title'],
                        'meta_title' => $data['meta_title'],
                        'meta_description' => $data['meta_description'],
                        'is_published' => true,
                        'featured_image' => $data['featured_image'],

                    ]);

                    $page->link()->create([
                        'slug' => $data['page_slug'],
                        'type' => 'service',
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
                Grid::make(3)->schema([
                    TextInput::make('page_title')->reactive()
                        ->afterStateUpdated(fn (Set $set, $state): string =>  $set('page_slug', str($state)->slug()))
                        ->required()->unique(
                            column: 'title',
                            ignoreRecord: true,
                        ),
                    TextInput::make('page_slug')

                        ->required(),
                    TextInput::make('meta_title')->required()->unique(ignoreRecord: true),
                    TextInput::make('meta_description')->unique(ignoreRecord: true),
                    FileUpload::make('featured_image')->preserveFilenames()->maxSize('1024'),

                ]),

                Builder::make('sections')->label('Page Sections')
                    ->blocks([

                        $this->heroWithService(),
                        $this->heroPageBuilder(),
                        $this->fullImageWidthSection(),
                        $this->headerSection(),
                        $this->cardSection(),
                        $this->testimonialsSection(),
                    ])
                    ->columns(3)
                    ->collapsed()
                    ->collapsible(),

            ])
            ->columns(1);
    }


}
