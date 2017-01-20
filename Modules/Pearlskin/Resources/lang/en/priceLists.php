<?php

$single = ucwords('price list');
$multiple = ucwords('price lists');

return [
    'list' => 'List ' . $multiple,
    'create' => 'Create ' . $multiple,
    'edit' => 'Edit ' . $multiple,
    'destroy' => 'Delete ' . $multiple,

    'title' => [
        'module' => $multiple,
        'list' => $single,
        'create' => 'Create a ' . $single,
        'edit' => 'Edit a ' . $single,
    ],
];
