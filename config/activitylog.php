<?php
return [
    'resources' => [
        'label'                     => "Journal d'activité",
        'plural_label'              => "Journaux d'activité",
        'navigation_group'          => null,
        'navigation_icon'           => 'heroicon-o-adjustments-vertical',
        'navigation_sort'           => null,
        'default_sort_column'       => 'id',
        'default_sort_direction'    => 'desc',
        'navigation_count_badge'    => false,
        'resource'                  => \Rmsramos\Activitylog\Resources\ActivitylogResource::class,
    ],
    'datetime_format' => 'd/m/Y H:i:s',
];