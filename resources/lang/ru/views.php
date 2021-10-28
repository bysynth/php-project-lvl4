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
    ],
    'tasks' => [
        'index' => [
            'header' => 'Задачи',
            'table' => [
                'id' => 'ID',
                'status' => 'Статус',
                'name' => 'Имя',
                'author' => 'Автор',
                'executor' => 'Исполнитель',
                'date' => 'Дата создания',
                'actions' => 'Действия'
            ],
            'buttons' => [
                'apply' => 'Применить',
                'create' => 'Создать задачу'
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
            'header' => 'Создать задачу',
            'buttons' => [
                'create' => 'Создать'
            ]
        ],
        'edit' => [
            'header' => 'Изменение задачи',
            'buttons' => [
                'update' => 'Обновить'
            ]
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
    ],
    'labels' => [
        'index' => [
            'header' => 'Метки',
            'table' => [
                'id' => 'ID',
                'name' => 'Имя',
                'desc' => 'Описание',
                'date' => 'Дата создания',
                'actions' => 'Действия'
            ],
            'buttons' => [
                'create' => 'Создать метку'
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
            'header' => 'Создать метку',
            'buttons' => [
                'create' => 'Создать'
            ]
        ],
        'edit' => [
            'header' => 'Изменение метки',
            'buttons' => [
                'update' => 'Обновить'
            ]
        ],
        'form' => [
            'fields' => [
                'name' => 'Имя',
                'desc' => 'Описание'
            ]
        ]
    ]
];
