<?php

namespace App\Filament\Resources;

use App\Filament\Concerns\HeroImageSectionConcern;
use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    use HeroImageSectionConcern;
    protected static ?string $model = Service::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    TextInput::make('page_title')->reactive()
                        ->afterStateUpdated(fn (Set $set, $state): string =>  $set('page_slug', str($state)->slug()))
                        ->required()->unique(
                            column: 'title',
                            ignoreRecord: true,
                        ),
                    TextInput::make('page_slug')

                        ->required(),
                    TextInput::make('meta_title')->required()->unique(ignoreRecord: true),
                    TextInput::make('meta_description')->unique(ignoreRecord: true),
                    FileUpload::make('featured_image')->preserveFilenames()->maxSize('1024'),

                ]),

                \Filament\Forms\Components\Builder::make('sections')->label('Page Sections')
                    ->blocks([

                        (new self())->heroWithService(),
                        (new self())->heroPageBuilder(),
                        (new self())->fullImageWidthSection(),
                        (new self())->headerSection(),
                        (new self())->cardSection(),
                        (new self())->testimonialsSection(),
                    ])
                    ->columns(3)
                    ->collapsed()
                    ->collapsible(),

            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
           return $table

        ->columns([
            TextColumn::make('title')->searchable()->size('sm'),
            IconColumn::make('is_front_page')->boolean()->size('sm'),
            TextColumn::make('meta_title')->size('sm'),
            IconColumn::make('is_published')
                ->size('sm')
                ->boolean(),
            TextColumn::make('published_at')->size('sm')
                ->dateTime(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
