<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserStatusEnum;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Components\Tabs::make('Tabs')
                    ->schema([
                       Components\Tabs\Tab::make("Profile")
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(false)
                                    ->alignCenter()
                                    ->columnSpanFull()
                                    ->avatar(),
                                Forms\Components\TextInput::make('name')
                                    ->unique(ignoreRecord: true)
                                    ->label(__("Entreprise"))
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('code')
                                    ->unique(ignoreRecord: true)
                                    ->label(__("Numéro"))
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('first_name')
                                    ->label(__("Prénom"))
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('last_name')
                                    ->label(__("Nom"))
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address')
                                    ->label(__("Adresse"))
                                    ->maxLength(255),
                                Forms\Components\Select::make('gender')
                                    ->native(false)
                                    ->options([
                                        'Mâle' => 'Mâle',
                                        'Femelle' => 'Femelle'
                                    ])
                                    ->label(__("Genre")),
                                Forms\Components\TextInput::make('phone')
                                    ->label(__("Téléphone"))
                                    ->unique(ignoreRecord: true)
                                    ->tel()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('email')
                                    ->label(__("E-mail"))
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                // Forms\Components\TextInput::make('password')
                                //     ->label("Mot de passe")
                                //     ->password(),

                                Forms\Components\Select::make('shipping_id')
                                    ->relationship('shipping', 'name')
                                    ->searchable()
                                    ->label(__("Expédition"))
                                    ->preload(),

                                Forms\Components\Select::make('status')
                                    ->native(false)
                                    ->options(UserStatusEnum::toArray())
                                    ->label(__("État"))
                                    ->required(),

                                (
                                    auth()->user()->hasRole('super_admin') ?

                                    Forms\Components\Select::make('roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable() :

                                    Components\Grid::make()
                                )

                            ])->columns(2),

                        Components\Tabs\Tab::make("Adresses")
                            ->schema([
                                Forms\Components\Repeater::make('addresses')
                                    ->relationship()
                                    ->columns(2)
                                    ->collapsible()
                                    ->deleteAction(
                                        fn(Action $action) => $action->requiresConfirmation(),
                                    )
                                    ->schema([
                                        Forms\Components\TextInput::make('first_name')
                                            ->label(__("Prénom"))
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('last_name')
                                            ->label(__("Nom"))
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('address_name')
                                            ->label(__("Adresse"))
                                            ->required()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('phone')
                                            ->label(__("Téléphone"))
                                            ->unique(ignoreRecord: true)
                                            ->tel()
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Select::make('city_id')
                                            ->relationship("city", 'name')
                                            ->searchable()
                                            ->preload()
                                            ->label(__("Ville"))
                                            ->required(),
                                        Forms\Components\TextInput::make('email')
                                            ->label(__("E-mail"))
                                            ->unique(ignoreRecord: true)
                                            ->email()
                                            ->maxLength(255),
                                    ])

                            ]),

                        Components\Tabs\Tab::make("Remise")

                            ->schema([
                                Forms\Components\Repeater::make('discounts')
                                    ->label(__("Remise"))
                                    ->relationship('discounts')
                                    ->label(false)
                                    ->addActionLabel('Ajouter a remise')
                                    ->schema([
                                        Forms\Components\Select::make('family_id')
                                            ->relationship('family', 'name')
                                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                            ->label(__("Famille"))
                                            ->preload()
                                            ->searchable()
                                            ->required(),
                                        Forms\Components\TextInput::make('percentage')
                                            ->required()
                                            ->label(__("Remise"))
                                            ->suffix("%")
                                            ->maxValue(30)
                                            ->minValue(0)
                                            ->integer()
                                            ->numeric()
                                            ->default(0)
                                    ])->columns(2)
                            ])
                    ])->columnSpanFull()
            ]);
    }
}
