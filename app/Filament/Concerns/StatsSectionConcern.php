<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

trait StatsSectionConcern
{
    protected function statsSection(): Block
    {
        return Block::make('stats_section')->schema([

            TextInput::make('heading')->required(),
            TextInput::make('subheading')->numeric(),
            FileUpload::make('bg_image')->label('Background Image')->required()->preserveFilenames(),
            Repeater::make('counts')
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('count')->required()->numeric(),
                Checkbox::make('has_plus_icon')->helperText('+'),
            ])->collapsible()->defaultItems(4),

        ]);
    }
}
