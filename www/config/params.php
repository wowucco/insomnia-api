<?php

$params = [
    'db' => [
        'host'     => getenv('ENV_POSTGRES_HOST'),
        'port'     => getenv('ENV_POSTGRES_PORT') ?: 5432,
        'dbName'   => getenv('ENV_POSTGRES_DB'),
        'username' => getenv('ENV_POSTGRES_USER'),
        'password' => getenv('ENV_POSTGRES_PASSWORD')
    ],
    'redis' => [
        'host' => getenv('ENV_REDIS_HOST'),
        'port' => getenv('ENV_REDIS_PORT') ?: 6379
    ],
    'lastfm' => [
        'apiUrl' => getenv('ENV_LASTFM_API_URL'),
        'apiKey' => getenv('ENV_LASTFM_API_KEY')
    ]
];

$envParams = __DIR__ . '/' . YII_ENV . '/params.php';

return \yii\helpers\ArrayHelper::merge(
    $params,
    file_exists($envParams) ? require($envParams) : []
);