<?php
return [
    'adminPermission' => [
        'type' => 2,
        'description' => 'Everything access',
    ],
    'editorPermission' => [
        'type' => 2,
        'description' => 'Everything but only user cannot',
    ],
    'authorPermission' => [
        'type' => 2,
        'description' => 'Everything but only user cannot',
    ],
    'adminRole' => [
        'type' => 1,
        'children' => [
            'adminPermission',
        ],
    ],
    'editorRole' => [
        'type' => 1,
        'children' => [
            'editorPermission',
        ],
    ],
    'authorRole' => [
        'type' => 1,
        'children' => [
            'authorPermission',
        ],
    ],
];
