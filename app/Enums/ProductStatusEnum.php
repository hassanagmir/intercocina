<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProductStatusEnum: int implements HasLabel, HasColor
{
    case IN = 1;
    case HIDE = 2;
    case OUT = 3;
    case COMING = 4;
    case ON_REQUEST = 5;



    public function getLabel(): ?string
    {
        return match ($this) {
            self::IN => "En stock",
            self::HIDE => "Cacher",
            self::OUT => "En rupture de stock",
            self::COMING => "À venir",
            self::ON_REQUEST => "Sur demande"
        };
    }


    public static function toArray()
    {
        return [
            1 => "En stock",
            2 => "Cacher",
            3 => "En rupture de stock",
            4 => "À venir",
            5 => "Sur demande",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::IN => 'success',
            self::HIDE => 'danger',
            self::OUT => 'warning',
            self::COMING => 'info',
            self::IN => 'success',
        };
    }
}
