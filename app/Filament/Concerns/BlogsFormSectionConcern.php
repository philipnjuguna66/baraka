<?php

namespace App\Filament\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;

trait BlogsFormSectionConcern
{
    protected function blogSection(): Block
    {
        return Block::make('blog_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('count')->numeric(),

        ]);
    }
    protected function teamSection(): Block
    {
        return Block::make('team_section')->schema([
            TextInput::make('heading')->required(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('count')->numeric(),

        ]);
    }
}
