<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatusEnum: int implements HasLabel, HasColor, HasIcon
{
    case ON_HOLD = 1;
    case CONFIRMED = 2;
    case PREPARATION = 3;
    case READY = 4;
    case CANCELED = 5;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ON_HOLD => "En Attente",
            self::CONFIRMED => "Confirmé",
            self::PREPARATION => "Préparation",
            self::READY => "Prêt",
            self::CANCELED => "Annulé",
        };
    }

    public static function toArray()
    {
        return [
            1 => "En Attente",
            2 => "Confirmé",
            3 => "Préparation",
            4 => "Prêt",
            5 => "Annulé",
        ];
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ON_HOLD => 'gray',
            self::CONFIRMED => 'warning',
            self::PREPARATION => "info",
            self::READY => "success",
            self::CANCELED => 'danger',
        };
    }

    public function getBg(): string | array | null
    {
        return match ($this) {
            self::ON_HOLD => 'gray',
            self::CONFIRMED => 'yellow',
            self::PREPARATION => "blue",
            self::READY => "green",
            self::CANCELED => 'red',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ON_HOLD => 'heroicon-m-clock',
            self::CONFIRMED => 'heroicon-m-phone-arrow-up-right',
            self::PREPARATION => 'heroicon-m-arrow-path',
            self::READY => 'heroicon-m-check-circle',
            self::CANCELED => 'heroicon-m-x-circle',
        };
    }
}
