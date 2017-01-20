<?php

$single = ucwords('ценови списък');
$multiple = ucwords('ценови списъци');
return [
    'list' => 'Преглед на ' . $multiple,
    'create' => 'Създаване на ' . $multiple,
    'edit' => 'Редактиране на ' . $multiple,
    'destroy' => 'Триене на ' . $multiple,

    'title' => [
        'module' => $single,
        'list' => $single,
        'create' => 'Създай ' . $single,
        'edit' => 'Редактирай ' . $single,
    ],
];
