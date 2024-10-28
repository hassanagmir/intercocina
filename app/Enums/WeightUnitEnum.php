<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum WeightUnitEnum: int implements HasLabel
{
    case GRAM = 1;
    case KILOGRAM = 1;


    /**
     * Get the label for each unit.
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::GRAM => 'G',
            self::KILOGRAM => 'KG',
        };
    }

    public static function toArray()
    {
        return [
            1 => "G",
            2 => "KG",
        ];
    }
}
