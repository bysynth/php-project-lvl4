<?php

return [
    'auth' => [
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
    ],
    'index' => [
        'header' => 'Привет от Хекслета!',
        'lead' => 'Практические курсы по программированию',
        'buttons' => [
            'learn' => 'Узнать больше'
        ]
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
            ],
            'data' => [
                'del_confirm' => 'Вы уверены?'
            ]
        ],
        'create' => [
            'header' => 'Создать статус',
            'buttons' => [
                'create' => 'Создать'
            ]
        ],
        'edit' => [
            'header' => 'Изменение статуса',
            'buttons' => [
                'update' => 'Обновить'
            ]
        ],
        'form' => [
            'fields' => [
                'name' => 'Имя',
            ]
        ]
    ]
];
