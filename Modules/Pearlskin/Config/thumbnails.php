<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov
 * Date: 7/26/16
 * Time: 8:09 PM
 */

return [
    'procedureThumb' => [
        'fit' => [
            'width' => '280',
            'height' => '280',
            'position' => 'top-left',
            'callback' => function($constraint) {
                $constraint->upsize();
            }
        ],
    ]
];