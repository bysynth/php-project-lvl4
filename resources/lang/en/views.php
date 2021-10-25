<?php

return [
    'auth' => [
        'login' => [
            'header' => 'Login',
            'fields' => [
                'email' => 'E-Mail Address',
                'password' => 'Password',
                'remember' => 'Remember Me'
            ],
            'buttons' => [
                'login' => 'Login'
            ]
        ],
        'register' => [
            'header' => 'Register',
            'fields' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'password' => 'Password',
                'confirm_password' => 'Confirm Password'
            ],
            'buttons' => [
                'register' => 'Register'
            ]
        ]
    ],
    'index' => [
        'header' => 'Hello from Hexlet!',
        'lead' => 'Practical programming courses',
        'buttons' => [
            'learn' => 'Learn more'
        ]
    ],
    'task_statuses' => [
        'index' => [
            'header' => 'Statuses',
            'table' => [
                'id' => 'ID',
                'name' => 'Name',
                'date' => 'Date of creation',
                'actions' => 'Actions'
            ],
            'buttons' => [
                'create' => 'Create Status'
            ],
            'links' => [
                'delete' => 'Delete',
                'edit' => 'Edit'
            ],
            'data' => [
                'del_confirm' => 'Are you sure?'
            ]
        ],
        'create' => [
            'header' => 'Create status',
            'buttons' => [
                'create' => 'Create'
            ]
        ],
        'edit' => [
            'header' => 'Edit status',
            'buttons' => [
                'update' => 'Update'
            ]
        ],
        'form' => [
            'fields' => [
                'name' => 'Name',
            ]
        ]
    ]
];
