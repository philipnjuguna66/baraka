<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

trait VideoFormSectionConcern
{
    protected function videoSection(): Block
    {
        return Block::make('video_section')->schema([

            TextInput::make('heading')->nullable(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            Repeater::make('videos')
            ->schema([
                TextInput::make('video_link')->required(),
            ]),

        ]);
    }
}
