<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        try {

            DB::beginTransaction();


            /** @var \App\Models\Service $page */
            $page = \App\Models\Service::create([
                'title' => $data['page_title'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'featured_image' => $data['featured_image'],
                'is_published' => true,

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

            return  $page;

        } catch (Halt $exception) {
            DB::rollBack();
            Notification::make('error')
                ->danger()
                ->body('page saved successfully')
                ->send();
        }
    }
}
