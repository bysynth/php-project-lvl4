<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Перевод валидации
    |--------------------------------------------------------------------------
    */

    'accepted' => ':Attribute должен быть принят.',
    'accepted_if' => ':Attribute должен быть принят когда :other :value.',
    'active_url' => ':Attribute не является допустимым URL.',
    'after' => ':Attribute должен быть датой после :date.',
    'after_or_equal' => ':Attribute должен быть датой после или равной :date.',
    'alpha' => ':Attribute должен содержать только буквы.',
    'alpha_dash' => ':Attribute должен содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ':Attribute должен содержать только буквы и цифры.',
    'array' => ':Attribute должен быть массивом.',
    'before' => ':Attribute должен быть датой перед :date.',
    'before_or_equal' => ':Attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ':Attribute должен быть между :min и :max.',
        'file' => ':Attribute должен быть между :min and :max килобайт.',
        'string' => ':Attribute должен быть между :min and :max символами.',
        'array' => ':Attribute должен иметь от :min до :max элементов.',
    ],
    'boolean' => 'Поле :Attribute должно быть истинным или ложным.',
    'confirmed' => ':Attribute и подтверждение не совпадают.',
    'current_password' => 'Пароль неверен.',
    'date' => ':Attribute не является допустимой датой.',
    'date_equals' => ':Attribute должен быть датой, равной :date.',
    'date_format' => ':Attribute не соответствует формату :format.',
    'different' => ':Attribute и :other должны отличаться.',
    'digits' => ':Attribute должен быть :digits цифрами.',
    'digits_between' => ':Attribute должен быть между :min and :max цифрами.',
    'dimensions' => ':Attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :Attribute имеет повторяющееся значение.',
    'email' => ':Attribute должен быть допустимым адресом электронной почты.',
    'ends_with' => ':Attribute должен заканчиваться одним из следующих :values.',
    'exists' => 'Выбранный :Attribute недействителен.',
    'file' => ':Attribute должен быть файлом.',
    'filled' => 'Поле :Attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':Attribute должен быть больше чем :value.',
        'file' => ':Attribute должен быть больше чем :value килобайт.',
        'string' => ':Attribute должен содержать больше чем :value символов.',
        'array' => ':Attribute должен содержать больше чем :value элементов.',
    ],
    'gte' => [
        'numeric' => ':Attribute должен быть больше либо равен :value.',
        'file' => ':Attribute должен быть больше либо равен :value килобайт.',
        'string' => ':Attribute должен быть больше либо равен :value символам.',
        'array' => ':Attribute должен содержать :value элементов или больше.',
    ],
    'image' => ':Attribute должен быть изображением.',
    'in' => 'Выбранный :Attribute недействителен.',
    'in_array' => 'Поле :Attribute не существует в :other.',
    'integer' => ':Attribute должен быть целым числом.',
    'ip' => ':Attribute должен быть действительным IP-адресом.',
    'ipv4' => ':Attribute должен быть действительным IPv4 адресом.',
    'ipv6' => ':Attribute должен быть действительным IPv6 адресом.',
    'json' => ':Attribute должен быть действительной JSON строкой.',
    'lt' => [
        'numeric' => ':Attribute должен быть меньше чем :value.',
        'file' => ':Attribute должен быть меньше чем :value килобайт.',
        'string' => ':Attribute должен быть меньше чем :value символов.',
        'array' => ':Attribute должно содержать меньше :value элементов.',
    ],
    'lte' => [
        'numeric' => ':Attribute должен быть меньше либо равен :value.',
        'file' => ':Attribute должен быть меньше либо равен :value килобайт.',
        'string' => ':Attribute должен быть меньше либо равен :value символам.',
        'array' => ':Attribute не может содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => ':Attribute не должно быть больше, чем :max.',
        'file' => ':Attribute не должно быть больше, чем :max килобайт.',
        'string' => ':Attribute не должно быть больше, чем :max символов.',
        'array' => ':Attribute не должен содержать более :max элементов.',
    ],
    'mimes' => ':Attribute должен быть файлом типа: :values.',
    'mimetypes' => ':Attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':Attribute должно быть не меньше :min.',
        'file' => ':Attribute должно быть не меньше :min килобайт.',
        'string' => ':Attribute должен иметь длину не менее :min символов.',
        'array' => ':Attribute должно содержать как минимум :min элементов.',
    ],
    'multiple_of' => ':Attribute должно быть кратным :value.',
    'not_in' => 'Выбранный :Attribute недействителен.',
    'not_regex' => 'Формат :Attribute недействителен.',
    'numeric' => ':Attribute должен быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'Поле :Attribute должно присутствовать.',
    'regex' => 'Формат :Attribute недействителен.',
    'required' => 'Это обязательное поле',
    'required_if' => 'Поле :Attribute является обязательным, когда :other :value.',
    'required_unless' => 'Поле :Attribute является обязательным, если :other не входит в :values.',
    'required_with' => 'Поле :Attribute необходимо, если присутствует :values.',
    'required_with_all' => 'Поле :Attribute необходимо, когда :values присутствуют.',
    'required_without' => 'Поле :Attribute необходимо, когда :values отсутствуют.',
    'required_without_all' => 'Поле :Attribute является обязательным, если нет ни одного из :values.',
    'prohibited' => 'Поле :Attribute запрещено.',
    'prohibited_if' => 'Поле :Attribute запрещено, когда :other :value.',
    'prohibited_unless' => 'Поле :Attribute запрещено, если :other не входитв в :values.',
    'prohibits' => 'Поле :Attribute запрещает присутствие :other.',
    'same' => ':Attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':Attribute должен быть :size.',
        'file' => ':Attribute должен быть :size килобайт.',
        'string' => ':Attribute должен быть :size символов.',
        'array' => ':Attribute должен содержать :size элементов.',
    ],
    'starts_with' => ':Attribute должен начинаться с одного из следующих: :values.',
    'string' => ':Attribute должен быть строкой.',
    'timezone' => ':Attribute действительным часовым поясом.',
    'unique' => ':Attribute уже занят.',
    'uploaded' => ':Attribute не удалось загрузить.',
    'url' => ':Attribute должен быть действительным URL.',
    'uuid' => ':Attribute должен быть действительным UUID.',

    'custom' => [
        'email' => [
            'unique' => 'Пользователь с таким email уже существует',
        ],
    ],

    'attributes' => [
        'password' => 'Пароль'
    ],

    'errors' => [
        'task_statuses' => [
            'unique' => 'Статус с таким именем уже существует'
        ],
        'tasks' => [
            'unique' => 'Задача с таким именем уже существует'
        ]
    ]

];
