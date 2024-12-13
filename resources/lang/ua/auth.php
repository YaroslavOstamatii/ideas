<?php
return [

    'required' => ':attribute є обов’язковим для заповнення.',
    'min' => [
        'string' => ':attribute має містити хоча б :min символів.',
    ],
    'max' => [
        'string' => ':attribute не може містити більше ніж :max символів.',
    ],
    'email' => ':attribute має бути дійсною електронною поштою.',
    'unique' => ':attribute вже зареєстровано.',

    'attributes' => [
        'name' => 'ім’я',
        'email' => 'електронна пошта',
        'password' => 'пароль',
    ],
    'register' => 'Реєстрація',
    'login' => 'Вхід',
];
