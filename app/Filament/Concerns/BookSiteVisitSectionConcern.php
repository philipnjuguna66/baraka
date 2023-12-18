<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

trait BookSiteVisitSectionConcern
{
    protected function bookSiteVisitSection(): Block
    {
        return Block::make('book_sit_visit_section')->label('Book Site Visit')->schema([

            TextInput::make('heading')->nullable(),
            TextInput::make('subheading')->numeric(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('office_location')->nullable(),
            TextInput::make('phone_number')->default('0714686511')->nullable(),
            TextInput::make('email')->default('sales@lifelong.co.ke')->nullable(),

        ]);
    }

    protected function headerSection(): Block
    {
        return Block::make('header_section')->schema([

            TextInput::make('heading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            RichEditor::make('content'),
        ]);
    }
}
