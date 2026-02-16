<?php

namespace App\Filament\Resources\ViewImages;

use App\Filament\Resources\ViewImages\Pages\CreateViewImage;
use App\Filament\Resources\ViewImages\Pages\EditViewImage;
use App\Filament\Resources\ViewImages\Pages\ListViewImages;
use App\Filament\Resources\ViewImages\Pages\ViewViewImage;
use App\Filament\Resources\ViewImages\Schemas\ViewImageForm;
use App\Filament\Resources\ViewImages\Schemas\ViewImageInfolist;
use App\Filament\Resources\ViewImages\Tables\ViewImagesTable;
use App\Models\ViewImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ViewImageResource extends Resource
{
    protected static ?string $model = ViewImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ViewImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ViewImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ViewImagesTable::configure($table);
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
            'index' => ListViewImages::route('/'),
            'create' => CreateViewImage::route('/create'),
            'view' => ViewViewImage::route('/{record}'),
            'edit' => EditViewImage::route('/{record}/edit'),
        ];
    }
}
