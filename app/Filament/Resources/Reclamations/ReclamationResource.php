<?php

namespace App\Filament\Resources\Reclamations;

use App\Filament\Resources\Reclamations\Pages\ListReclamations;
use App\Filament\Resources\Reclamations\Schemas\ReclamationForm;
use App\Filament\Resources\Reclamations\Schemas\ReclamationInfolist;
use App\Filament\Resources\Reclamations\Tables\ReclamationsTable;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use App\Models\Reclamation;
use Filament\Tables\Table;
use BackedEnum;

class ReclamationResource extends Resource
{
    protected static ?string $model = Reclamation::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $recordTitleAttribute = 'client_number';


    public static function getModelLabel(): string
    {
        return __("Réclamation");
    }


    public static function canCreate(): bool
    {
        return false;
    }


    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('status', 1)->count();
    }



    public static function form(Schema $schema): Schema
    {
        return ReclamationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReclamationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReclamationsTable::configure($table);
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
            'index' => ListReclamations::route('/'),
            // 'create' => CreateReclamation::route('/create'),
            // 'view' => ViewReclamation::route('/{record}'),
            // 'edit' => EditReclamation::route('/{record}/edit'),
        ];
    }
}
