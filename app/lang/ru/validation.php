<?php

return [
'custom' => [
    'email' => [
        'required' => 'Нам нужно знать ваш email!',
        'unique' => 'Простите, но кто-то уже использует этот email',
    ],
    'fName' => [
        'required' => 'А как ваше имя?',
        'min' => 'Вас точно так звать?',
    ],
    'lName' => [
        'required' => 'Это конечно не важно, но какова ваша фамилия?',
        'min' => 'Ваша фамилия точно так звучит?',
    ],
    'password' => [
        'required' => 'А как же без пароля?',
        'confirmed' => 'Похоже что вы ошиблись при подтверждении пароля, попробуйте снова',
    ],
    'password_confirmation' => [
        'required' => 'Пароль нужно подтвердить!',
    ]
],
];
