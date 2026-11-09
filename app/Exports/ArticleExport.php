<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticleExport implements FromArray, WithHeadings, ShouldAutoSize
{
    public function __construct(protected array $data)
    {
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Référence',
            'Désignation',
            'Dimensions',
            'Profondeur',
            'Épaisseur',
            'Prix',
            'Couleur',
        ];
    }
}