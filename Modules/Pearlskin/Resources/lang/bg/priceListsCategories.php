<?php

$single = ucwords('категория на ценови списък');
$multiple = ucwords('категории на ценови списъци');
return [
    'list' => 'Преглед на ' . $multiple,
    'create' => 'Създаване на ' . $multiple,
    'edit' => 'Редактиране на ' . $multiple,
    'destroy' => 'Триене на ' . $multiple,

    'title' => [
        'module' => $multiple,
        'list' => $single,
        'create' => 'Създай ' . $single,
        'edit' => 'Редактирай ' . $single,
    ],
];
