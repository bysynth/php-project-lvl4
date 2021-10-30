<?php

return [
    'index' => [
        'header' => 'Задачи',
        'filter' => [
            'status' => 'Статус',
            'author' => 'Автор',
            'executor' => 'Исполнитель'
        ],
        'table' => [
            'id' => 'ID',
            'status' => 'Статус',
            'name' => 'Имя',
            'author' => 'Автор',
            'executor' => 'Исполнитель',
            'date' => 'Дата создания',
            'actions' => 'Действия'
        ],
    ],
    'create' => [
        'header' => 'Создать задачу',
    ],
    'edit' => [
        'header' => 'Изменение задачи',
    ],
    'form' => [
        'fields' => [
            'name' => 'Имя',
            'desc' => 'Описание',
            'status' => 'Статус',
            'executor' => 'Исполнитель',
            'labels' => 'Метки'
        ]
    ],
    'show' => [
        'header' => 'Просмотр задачи',
        'name' => 'Имя',
        'status' => 'Статус',
        'description' => 'Описание',
        'labels' => 'Метки'
    ]
];
