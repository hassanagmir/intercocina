<?php

namespace App\Enums;



enum UserStatusEnum: int {

    case ACTIVE = 1;
    case INACTIVE = 2;
    case IGNORD = 3;



    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => "Actif",
            self::INACTIVE => "Cacher",
            self::IGNORD => "Ignorée",
        };
    }


    public static function toArray()
    {
        return [
            1 => "Actif",
            2 => "Cacher",
            3 => "Ignorée",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'warning',
            self::IGNORD => 'danger',
        };
    }


}