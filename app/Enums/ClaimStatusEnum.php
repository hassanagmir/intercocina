<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ClaimStatusEnum: int implements HasLabel, HasColor, HasIcon
{
    case ON_HOLD = 1;
    case CONFIRMED = 2;

    

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ON_HOLD => "En Attente",
            self::CONFIRMED => "Confirmé",

        };
    }


    public static function toArray()
    {
        return [
            1 => "En Attente",
            2 => "Confirmé",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ON_HOLD => 'gray',
            self::CONFIRMED => 'success',
        };
    }


    public function getIcon(): ?string
    {
        return match ($this) {
            self::ON_HOLD => 'heroicon-m-clock',
            self::CONFIRMED => 'heroicon-m-phone-arrow-up-right',
        };
    }
}
