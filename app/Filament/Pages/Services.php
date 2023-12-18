<?php

namespace App\Filament\Pages;

use App\Filament\Concerns\HeroImageSectionConcern;
use App\Models\Category;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;

class Services extends Page implements HasTable
{
    use InteractsWithTable;

    use HeroImageSectionConcern;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.services';


    protected function getActions(): array
    {
        return [
            CreateAction::make('New Service')
                ->label("New Service")
                ->url(CreateService::getUrl()),
            Action::make('Category')
                ->label("Category")
                ->slideOver()
                ->action(fn() => null)
                ->closeModalByClickingAway(false)


        ];
    }

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|Relation|null
    {
        return \App\Models\Page::query();
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Service::query())
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
            ->headerActions([
                \Filament\Tables\Actions\Action::make("Categories")
                    ->label('Categories')
                    ->table($table->query(Category::query())
                        ->columns([
                            TextColumn::make('name')
                        ]))
                ->action(fn() => null)
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


    private function categoriesTable(Table $table)
    {
        return $table->query(Category::query())
            ->columns([
                TextColumn::make('name')
            ]);


    }

}
