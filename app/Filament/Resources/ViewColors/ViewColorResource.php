<?php

namespace App\Filament\Resources\ViewColors;

use App\Filament\Resources\ViewColors\Pages\CreateViewColor;
use App\Filament\Resources\ViewColors\Pages\EditViewColor;
use App\Filament\Resources\ViewColors\Pages\ListViewColors;
use App\Filament\Resources\ViewColors\Pages\ViewViewColor;
use App\Filament\Resources\ViewColors\Schemas\ViewColorForm;
use App\Filament\Resources\ViewColors\Schemas\ViewColorInfolist;
use App\Filament\Resources\ViewColors\Tables\ViewColorsTable;
use App\Models\ViewColor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ViewColorResource extends Resource
{
    protected static ?string $model = ViewColor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ViewColorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ViewColorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ViewColorsTable::configure($table);
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
            'index' => ListViewColors::route('/'),
            // 'create' => CreateViewColor::route('/create'),
            // 'view' => ViewViewColor::route('/{record}'),
            // 'edit' => EditViewColor::route('/{record}/edit'),
        ];
    }
}
