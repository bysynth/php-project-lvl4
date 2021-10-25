<?php

return [
    'nav' => [
        'left' => [
            'tasks' => 'Задачи',
            'statuses' => 'Статусы',
            'labels' => 'Метки'
        ],
        'right' => [
            'login' => 'Вход',
            'logout' => 'Выход',
            'register' => 'Регистрация'
        ],
        'mobile' => [
            'toggle' => 'Toggle navigation'
        ]
    ],
    'index_page' => [
        'hello' => 'Привет от Хекслета!',
        'desc' => 'Практические курсы по программированию',
        'buttons' => [
            'learn' => 'Узнать больше'
        ]
    ],
    'login' => [
        'header' => 'Вход',
        'fields' => [
            'email' => 'Email',
            'password' => 'Пароль',
            'remember' => 'Запомнить меня'
        ],
        'buttons' => [
            'login' => 'Войти'
        ],
    ],
    'register' => [
        'header' => 'Регистрация',
        'fields' => [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение'
        ],
        'buttons' => [
            'register' => 'Зарегистрировать'
        ],
    ],
    'task_statuses' => [
        'index' => [
            'header' => 'Статусы',
            'table' => [
                'id' => 'ID',
                'name' => 'Имя',
                'date' => 'Дата создания',
                'actions' => 'Действия'
            ],
            'buttons' => [
                'create' => 'Создать статус'
            ],
            'links' => [
                'delete' => 'Удалить',
                'edit' => 'Изменить'
            ]
        ],
        'create' => [
            'header' => 'Создать статус',
            'fields' => [
                'name' => 'Имя',
            ],
            'buttons' => [
                'create' => 'Создать'
            ]
        ],
        'edit' => [
            'header' => 'Изменение статуса',
            'fields' => [
                'name' => 'Имя',
            ],
            'buttons' => [
                'update' => 'Обновить'
            ]
        ]
    ]
];
