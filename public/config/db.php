<?php

use yii\db\Connection;

return [
    'class' => Connection::class,
    'dsn' => 'pgsql:host=wiam-pgsql;dbname=postgres',
    'username' => 'postgres',
    'password' => 'postgres',
    'charset' => 'utf8',
];
