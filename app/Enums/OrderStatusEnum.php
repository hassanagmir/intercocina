<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum OrderStatusEnum: int implements HasLabel, HasColor
{
    case ON_HOLD = 1;
    case CONFIRMED = 2;
    case CANCELD = 3;



    public function getLabel(): ?string
    {
        return match ($this) {
            self::ON_HOLD => "En Attente",
            self::CONFIRMED => "Confirmé",
            self::CANCELD => "Annulé",
        };
    }


    public static function toArray()
    {
        return [
            1 => "En Attente",
            2 => "Confirmé",
            3 => "Annulé",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ON_HOLD => 'info',
            self::CONFIRMED => 'success',
            self::CANCELD => 'danger',
        };
    }
}
