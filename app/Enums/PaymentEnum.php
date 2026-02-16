<?php

namespace App\Enums;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentEnum: int implements HasLabel, HasIcon
{
    case BANK_TRANSFER = 1;
    case DEPOSIT_AT_AGENCIES = 2;
    case CHECK = 3;

    

    public function getLabel(): ?string
    {
        return match ($this) {
            self::BANK_TRANSFER => "Virement Bancaire",
            self::DEPOSIT_AT_AGENCIES => "Versement Agences",
            self::CHECK => "Chèque",

        };
    }


    public static function toArray()
    {
        return [
            1 => "Virement Bancaire",
            2 => "Versement Agences",
            3 => "Chèque"
        ];
    }



    public function getIcon(): ?string
    {
        return match ($this) {
            self::BANK_TRANSFER => 'heroicon-m-arrows-up-down',
            self::DEPOSIT_AT_AGENCIES => 'heroicon-m-building-library',
            self::CHECK => 'heroicon-m-banknotes',
        };
    }
}
