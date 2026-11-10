<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static string|BackedEnum|null $navigationIcon =
        'heroicon-o-cube-transparent';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Marque');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'tags',
            'description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->placeholder(__('Nom de la marque'))
                                    ->label(__('Nom'))
                                    ->required()
                                    ->maxLength(255),

                                TagsInput::make('tags')
                                    ->label(__('Mots clés'))
                                    ->placeholder(__('Mot-clé'))
                                    ->separator(',')
                                    ->default(null),

                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan([
                                'default' => 3,
                                'lg' => 2,
                            ]),

                        Section::make()
                            ->schema([
                                FileUpload::make('logo')
                                    ->required()
                                    ->columnSpanFull()
                                    ->alignCenter()
                                    ->hiddenLabel()
                                    ->image(),

                                Toggle::make('status')
                                    ->inline(false)
                                    ->helperText(
                                        'Rendre cette marque visible pour tout le monde.'
                                    )
                                    ->label(__('Visibilité'))
                                    ->default(true)
                                    ->required(),
                            ])
                            ->columnSpan([
                                'default' => 3,
                                'lg' => 1,
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label(__('Logo')),

                TextColumn::make('name')
                    ->label(__('Marque'))
                    ->searchable()
                    ->sortable(),

                IconColumn::make('status')
                    ->label(__('Visibilité'))
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label(__('Créé le'))
                    ->date()
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault: true
                    ),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
