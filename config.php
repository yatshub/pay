<?php

return [
    'id' => 'pay',
    'basePath' => __DIR__,
    'controllerNamespace' => 'pay\controllers',
    'aliases' => [
        '@pay' => __DIR__,
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:@pay/database.sqlite',
        ],
    ],
];
