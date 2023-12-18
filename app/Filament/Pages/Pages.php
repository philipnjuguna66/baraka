<?php

namespace App\Filament\Pages;

use App\Filament\Concerns\HeroImageSectionConcern;
use App\Models\PageSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;

class Pages extends Page implements HasTable
{
    use InteractsWithTable;

    use HeroImageSectionConcern;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.pages';

    protected function getActions(): array
    {
        return [
            CreateAction::make('new Page')
                ->url(CreatePage::getUrl()),

        ];
    }

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|Relation|null
    {
        return \App\Models\Page::query();
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Page::query())
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
                EditAction::make()
                    ->icon(null)
                    ->url(fn(\App\Models\Page $page) => EditPage::getUrl(['page' => $page->id])),


            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
