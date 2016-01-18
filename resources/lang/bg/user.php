<?php

return [
    'index'     => 'Потребители',
    'create'    => 'Създаване',
    'show'      => 'Преглед',
    'edit'      => 'Промяна',
    'fields'    => [
        'name'          => 'Име',
        'email'         => 'Email',
        'password'      => 'Парола',
        'password_confirmation' => 'Парола отново',
        'is_admin'      => 'Администратор?',
    ],
    'is_admin'  => [
        'all'       => 'Админи и читатели',
        'true'      => 'Администратор',
        'false'     => 'Читател',
    ],
];
