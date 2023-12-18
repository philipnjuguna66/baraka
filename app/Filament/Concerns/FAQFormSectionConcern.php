<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

trait FAQFormSectionConcern
{
    use TimelineConcern;
    protected function faqSection(): Block
    {
        return Block::make('faq_section')->schema([

            Select::make('template')
                ->options([
                    'default' => "One Column",
                    'grid'  => "Two Columns"
                ])
                ->required(),
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            Repeater::make('faqs')
            ->schema([
                TextInput::make('title')->required(),
                RichEditor::make('description')->required(),
            ])->collapsed()
            ->collapsible(),

        ]);
    }

    protected function accordionSection(): Block
    {
        return Block::make('accordion_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            Repeater::make('faqs')
            ->schema([
                TextInput::make('title')->required(),
                RichEditor::make('description')->required(),
            ])
                ->collapsed()
            ->collapsible(),

        ]);
    }
}
