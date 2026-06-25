<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

class ImportExport extends Page
{
    protected string $view = 'filament.pages.import-export';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::ArrowsUpDown;

    protected static string | UnitEnum | null $navigationGroup = "Plus d'options";


    public function getTitle(): string|Htmlable
    {
        return '';
    }


    public static function getNavigationLabel(): string
    {
        return __("Import Export");
    }
}
