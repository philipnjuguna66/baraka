<?php

namespace App\Filament\Concerns;

use App\Filament\Resources\Concerns\FullImageWidthFormSectionConcern;
use App\Models\Permalink;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

trait HeroImageSectionConcern
{

    protected function heroLeftImage(): Block
    {
        return Block::make('hero_left_image_section')->label('Hero section With Image')->schema([

            TextInput::make('heading')->nullable(),
            Checkbox::make('margin_top')->label('Add margin Top'),
            Select::make('align_image')->options([
                'left' => 'Left',
                'right' => 'Right',
            ])
                ->preload()
                ->searchable()
                ->required(),
            RichEditor::make('description')->required(),
            FileUpload::make('image')->preserveFilenames()->required(),
            Checkbox::make('bg_white')->label('White Background')->required(),
            Grid::make(2)->schema([
                TextInput::make('cta_url')->label('cta url'),
                TextInput::make('cta_name')->label('cta label'),
            ]),

        ]);
    }

    public function heroWithService(): Block
    {
        return Block::make('hero_with_service_section')->reactive()->label(function (Get $get): string {
            return $get('heading') ?? "Hero with Sections";
        })
            ->schema([
                TextInput::make('heading')->reactive(),
                Textarea::make('subheading')->reactive(),
                FileUpload::make('image')->preserveFilenames()->required(),
                Repeater::make('sections')
                    ->schema([
                        RichEditor::make('content')
                    ]),
                Checkbox::make('has_contact_form'),
            ]);
    }

    public function htmlSection(): Block
    {
        return Block::make('html_section')
            ->schema([
                Textarea::make('html')
                    ->helperText('paste html code here, use tailwind css')
            ]);
    }

    protected function sliderSection(): Block
    {
        return Block::make('slider_section')->schema([

            Repeater::make('sliders')
                ->schema([
                    FileUpload::make('image')->preserveFilenames()->required(),
                    Select::make('url')
                        ->label('link')
                        ->options(Permalink::pluck('title', 'slug'))
                        ->searchable()
                        ->preload()
                        ->lazy(),
                ])
                ->collapsible()
                ->collapsed()
                ->defaultItems(1),

        ]);
    }

    public function heroPageBuilder(): Block
    {

        return Block::make('hero_page_builder_section')
            ->schema([
                TextInput::make('columns')->numeric()->default(2)->maxValue(4)->reactive(),
                Checkbox::make('bg_white'),
                FileUpload::make('bg_image')->preserveFilenames()->maxSize(1024),
                TextInput::make('heading')->nullable(),
                Select::make('heading_type')
                    ->options([
                        "1" => 'h1',
                        "2" => "h2",
                        "3" => "h3",
                        "4" => "h4",
                        "5" => "h5",
                        "6" => "h6"
                    ])
                    ->nullable(),
                RichEditor::make('sub_heading'),
                Grid::make(1)->schema(function ($get): array {

                    $sections = [];

                    for ($i = 1; $i <= $get('columns'); $i++) {
                        $sections[] =
                            Section::make("Column {$i}")
                                ->description("add details to this section")
                                ->schema([

                                    Builder::make('columns_sections.' . $i)->label('Page Sections')
                                        ->collapsible()
                                        ->blocks([
                                            $this->headerSection(),
                                            Block::make('header')
                                                ->schema([
                                                    TextInput::make('heading')->label("Heading")->reactive(),
                                                    TextInput::make('subheading')->label("Sub Heading")->reactive(),
                                                ])
                                                ->columns(2),
                                            Block::make('image')
                                                ->schema([
                                                    FileUpload::make('image')->preserveFilenames(),
                                                    TextInput::make('title')->helperText("image title"),
                                                ])
                                            ,
                                            Block::make('video')
                                                ->schema([
                                                    TextInput::make('video_path'),
                                                    Toggle::make('autoplay'),
                                                ]),
                                            Block::make('sliders')
                                                ->schema([
                                                    FileUpload::make('image')->preserveFilenames()
                                                ]),
                                            Block::make('booking_form')
                                                ->schema([
                                                    Checkbox::make('has_contact_form'),
                                                ]),
                                            Block::make('text_area')
                                                ->schema([
                                                    Checkbox::make('has_border_color'),
                                                    RichEditor::make('body'),
                                                ]),
                                            $this->masonaryBlocks(),
                                            $this->cardSection(),
                                            $this->buttons(),
                                            $this->gallerySection(),
                                        ])
                                        ->collapsible(),
                                ]);
                    }

                    return $sections;
                }),
                TextInput::make('label')->label("Button Label"),
                TextInput::make('url')->label('Button Url'),
                TextInput::make('color')->type('color')->label("Button Background Color"),


            ]);

    }


    private function masonaryBlocks()
    {
        return Block::make('masonary_block')
            ->schema([
                TextInput::make('heading')->label("Heading")->reactive(),
                FileUpload::make('image')->preserveFilenames(),
                TextInput::make('title')->helperText("image title"),
                Textarea::make('description'),
            ]);
    }

    protected function fullImageWidthSection(): Block
    {
        return Block::make('full_image_width')->schema([

            FileUpload::make('image')->nullable(),
            TextInput::make('url'),

        ]);
    }

    protected function buttons(): Block
    {
        return Block::make('buttons')->schema([

            TextInput::make('label')->label("Button Label"),
            TextInput::make('url'),

        ]);
    }

    protected function gallerySection(): Block
    {
        return Block::make('gallery_section')
            ->label(fn(Get $get) => $get("heading"))->schema([
                TextInput::make('heading'),
                Select::make('type')
                    ->options([
                        'slider' => 'Slider',
                        'grid' => 'Grid',
                    ])
                    ->required()
                    ->reactive()
                    ->searchable()
                    ->preload(),
                Grid::make(1)
                    ->schema([

                        RichEditor::make('content'),
                        Grid::make(2)->schema([
                            TextInput::make('cta_url')->label('cta url'),
                            TextInput::make('cta_name')->label('cta label'),
                        ]),
                    ])
                    ->hidden(fn(Get $get): bool => $get('type') == 'grid'),

                Repeater::make('images')->schema([
                    FileUpload::make('image')->preserveFilenames()->required(),
                    TextInput::make('image_name')->label('Image Name'),
                    TextInput::make('url'),
                ]),

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

    protected function cardSection(): Block
    {
        return Block::make('card_section')->schema([

            TextInput::make('heading')->nullable(),
            TextInput::make('margin_top')->numeric()->nullable(),
            TextInput::make('columns')->numeric()->default(3),
            TextInput::make('subheading')->nullable(),

            Checkbox::make('bg_white')->label('White Background')->nullable(),
            Repeater::make('cards')
                ->schema([
                    TextInput::make('title')->nullable(),
                    TextInput::make('image_name')->nullable(),
                    FileUpload::make('image')->preserveFilenames()->nullable(),
                    Textarea::make('description')->nullable(),
                    TextInput::make('view_more_link_label')->nullable(),
                    Select::make('view_more_link')
                        ->options(Permalink::query()->pluck('slug', 'id'))
                        ->searchable()
                        ->preload()

                ])
                ->columns(2)
                ->collapsible(),

        ]);
    }

    protected function testimonialsSection(): Block
    {
        return Block::make('testimonials_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('count')->nullable()->numeric(),
            TextInput::make('link')->nullable(),

        ]);
    }

    protected function serviceSection(): Block
    {
        return Block::make('service_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->required(),

            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('count')->numeric(),
            Select::make('service_link')
                ->options(
                    Permalink::query()->whereType('page')->get()->map(fn(Permalink $permalink) => [
                        $permalink->slug => $permalink->linkable?->name
                    ]))
                ->searchable()
                ->preload(),
        ]);

    }
}
