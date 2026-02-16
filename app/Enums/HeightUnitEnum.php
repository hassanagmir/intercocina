<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum HeightUnitEnum: int implements HasLabel
{
    case MILLIMETER = 1;
    case CENTIMETER = 2;
    case METER = 3;


    /**
     * Get the label for each unit.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::MILLIMETER => 'mm',
            self::CENTIMETER => 'cm',
            self::METER => 'm',
        };
    }

    public static function toArray()
    {
        return [
            1 => "mm",
            2 => "cm",
            3 => "m",
        ];
    }
}
