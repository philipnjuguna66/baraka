<?php

namespace App\Filament\Pages;

use App\Events\PageCreatedEvent;
use App\Filament\Concerns\HeroImageSectionConcern;
use App\Models\PageSection;
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

class EditPage extends Page
{

    use InteractsWithActions;

    use HeroImageSectionConcern;


    public \App\Models\Page $page;

    protected static ?string $slug = "page/{page}/edit";

    public $page_title;

    public $page_slug;

    public  $is_front_page;
    public $meta_title;
    public $meta_description;

    public $sections;



    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.create-page';

    protected static bool $shouldRegisterNavigation = false;


    public function mount(\App\Models\Page $page)
    {

        $data['page_slug'] = $page->link?->slug;
        $data['page_title'] = $page->title;
        $data['meta_title'] = $page->meta_title;
        $data['is_front_page'] = $page->is_front_page;
        $this->is_front_page = $page->is_front_page;
        $data['meta_description'] = $page->meta_description;

        $sections = PageSection::query()->wherePageId($page->id)->get();
        //$data['sections'] = $sections;

        foreach ($sections as $section) {
            $extra = [];

            foreach ($section->extra as $key => $extraData) {

                $extra[$key] = $extraData;

            }
            $data['sections'][] = [
                'type' => $section->type->value,
                'data' => $extra,
            ];
            // dd($section);

        }

        $this->form->fill($data);
    }


    public function submitAction()
    {

        return \Filament\Actions\Action::make('Submit')

            ->action(function () {

                $data = $this->form->getState();

                $page = $this->page;



                    try {

                        DB::beginTransaction();


                        $page->update([
                            'title' => $data['page_title'],
                            'meta_title' => $data['meta_title'],
                            'meta_description' => $data['meta_description'],
                            'is_front_page' => $this->is_front_page,
                            'is_published' => true,
                        ]);

                        $page->sections()->delete();

                        foreach ($data['sections'] as $section) {

                            $page->sections()->create([
                                'type' => $section['type'],
                                'extra' => $section['data'],
                            ]);

                        }

                        DB::commit();

                        return Notification::make('success')
                            ->success()
                            ->body("Successfully to update")
                            ->send();

                    }
                    catch (\Exception $e)
                    {
                        DB::rollBack();


                        return Notification::make('error')
                            ->danger()
                            ->title($e->getMessage())
                            ->body("Failed to update")
                            ->send();

                    }
            });
    }



    public  function form(Form $form): Form
    {
        return (new CreatePage())->form($form);

    }


}
