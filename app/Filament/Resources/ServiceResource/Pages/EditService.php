<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\PageSection;
use App\Models\Service;
use App\Models\ServiceSection;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $service =  $this->getRecord();

        $data['page_slug'] = $service->link?->slug;
        $data['page_title'] = $service->title;
        $data['meta_title'] = $service->meta_title;

        $data['featured_image'] = $service->featured_image;
        $data['meta_description'] = $service->meta_description;

        $sections = ServiceSection::query()->whereServiceId($service->id)->get();
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

        return  $data;

    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {

            DB::beginTransaction();


            /** @var Service $page */

            $page = $record;

            $record->updateQuietly([
                'title' => $data['page_title'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'featured_image' => $data['featured_image'],
                'is_published' => true,

            ]);

            $page->link()->delete();

            $page->link()->create([
                'slug' => $data['page_slug'],
                'type' => 'service',
            ]);

            $page->sections()->delete();

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

            return $record;

        } catch (Halt $exception) {
            DB::rollBack();
            Notification::make('error')
                ->danger()
                ->body('page saved successfully')
                ->send();
        }
    }
}
