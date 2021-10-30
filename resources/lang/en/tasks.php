<?php

return [
    'index' => [
        'header' => 'Tasks',
        'filter' => [
            'status' => 'Status',
            'author' => 'Author',
            'executor' => 'Executor'
        ],
        'table' => [
            'id' => 'ID',
            'status' => 'Status',
            'name' => 'Name',
            'author' => 'Author',
            'executor' => 'Executor',
            'date' => 'Date of creation',
            'actions' => 'Actions'
        ],
    ],
    'create' => [
        'header' => 'Create task',
    ],
    'edit' => [
        'header' => 'Edit task',
    ],
    'form' => [
        'fields' => [
            'name' => 'Name',
            'desc' => 'Description',
            'status' => 'Status',
            'executor' => 'Executor',
            'labels' => 'Labels'
        ]
    ],
    'show' => [
        'header' => 'View a task',
        'name' => 'Name',
        'status' => 'Status',
        'description' => 'Description',
        'labels' => 'Labels'
    ]
];
