<?php

return [
    'nav' => [
        'left' => [
            'tasks' => 'Tasks',
            'statuses' => 'Statuses',
            'labels' => 'Labels'
        ],
        'right' => [
            'login' => 'Login',
            'logout' => 'Logout',
            'register' => 'Register',
        ],
        'mobile' => [
            'toggle' => 'Toggle navigation'
        ]
    ],
    'index_page' => [
        'hello' => 'Hello from Hexlet!',
        'desc' => 'Practical programming courses',
        'buttons' => [
            'learn' => 'Learn more'
        ]
    ],
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
            ]
        ],
        'create' => [
            'header' => 'Create status',
            'fields' => [
                'name' => 'Name',
            ],
            'buttons' => [
                'create' => 'Create'
            ]
        ],
        'edit' => [
            'header' => 'Edit status',
            'fields' => [
                'name' => 'Name',
            ],
            'buttons' => [
                'update' => 'Update'
            ]
        ]
    ]
];
