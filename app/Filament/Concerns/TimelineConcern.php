<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

trait TimelineConcern
{

    public function timeline(): Block
    {
        return Block::make('timeline_section')
            ->reactive()
            ->label(fn(\Closure $get) => $get("heading"))->schema([
                Select::make('type')
                    ->options([
                        'horizontal' => "Horizontal",
                        'vertical'  => "Vertical"
                    ])
                    ->required(),

                Checkbox::make('bg_white')->label('White Background')->nullable(),
                TextInput::make('heading')
                    ->required()
                    ->reactive(),
                TextInput::make('subheading')
                    ->reactive(),

                Repeater::make('items')
                ->schema([

                    TextInput::make('title')->required(),
                    TextInput::make('label')->required(),
                    FileUpload::make('image')
                        ->preserveFilenames(),
                    Textarea::make('content')->required(),
                ])
                    ->collapsed()
                    ->collapsible()
                ->defaultItems(2)
            ]);

    }

}
