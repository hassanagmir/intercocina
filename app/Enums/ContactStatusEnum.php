<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ContactStatusEnum: int implements HasLabel, HasColor, HasIcon
{
    case ON_HOLD = 1;
    case VIEWED = 2;

    

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ON_HOLD => "En Attente",
            self::VIEWED => "Vu",

        };
    }


    public static function toArray()
    {
        return [
            1 => "En Attente",
            2 => "Vu",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ON_HOLD => 'gray',
            self::VIEWED => 'success',
        };
    }


    public function getIcon(): ?string
    {
        return match ($this) {
            self::ON_HOLD => 'heroicon-m-clock',
            self::VIEWED => 'heroicon-m-check-circle',
        };
    }
}
