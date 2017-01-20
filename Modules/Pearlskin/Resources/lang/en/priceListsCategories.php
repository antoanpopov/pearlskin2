<?php

$single = ucwords('price list category');
$multiple = ucwords('price list categories');

return [
    'list' => 'List ' . $multiple,
    'create' => 'Create ' . $multiple,
    'edit' => 'Edit ' . $multiple,
    'destroy' => 'Delete ' . $multiple,

    'title' => [
        'module' => $single,
        'list' => $single,
        'create' => 'Create a ' . $single,
        'edit' => 'Edit a ' . $single,
    ],
];
