<?php

namespace App\Filament\Resources\Products\RelationManagers;

use App\Filament\Resources\Products\Schemas\DimensionFields;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DimensionsRelationManager extends RelationManager
{
    protected static string $relationship = 'dimensions';

    protected static ?string $title = 'Dimensions';

    private const MAX = 300;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 2, 'md' => 4])
            ->components(DimensionFields::make());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('code')
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->select([
                    'id', 'product_id', 'code', 'price', 'height', 'width',
                    'thicknesse', 'depth', 'weight', 'color_id', 'attribute_id',
                ])
                ->with(['color:id,name', 'attribute:id,name']))
            ->defaultSort('id')
            ->paginated([25, 50, 100])
            ->defaultPaginationPageOption(25)
            ->striped()
            ->columns([
                TextColumn::make('code')->label(__('Réf'))->searchable()->size(TextSize::Small),
                TextColumn::make('height')->label(__('H'))->size(TextSize::Small),
                TextColumn::make('width')->label(__('L'))->size(TextSize::Small),
                TextColumn::make('thicknesse')->label(__('Ép.'))->size(TextSize::Small),
                TextColumn::make('depth')->label(__('Prof.'))->size(TextSize::Small)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('weight')->label(__('Poids'))->size(TextSize::Small)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('price')->label(__('Prix'))->money('MAD')->sortable()->size(TextSize::Small),
                TextColumn::make('color.name')->label(__('Couleur'))->size(TextSize::Small),
                TextColumn::make('attribute.name')->label(__('Attribut'))->size(TextSize::Small),
            ])
            ->headerActions([
                CreateAction::make()
                    ->modalWidth(Width::ThreeExtraLarge)
                    ->visible(fn () => $this->getOwnerRecord()->dimensions()->count() < self::MAX),
            ])
            ->recordActions([
                EditAction::make()->iconButton()->modalWidth(Width::ThreeExtraLarge),
                DeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}