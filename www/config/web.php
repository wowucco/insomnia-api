<?php

$config = [
    'id' => 'insomnia-web',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'playRockCookieValidationKey',
        ],
        'errorHandler' => [
            'errorAction' => '',
        ]
    ]
];

$envConfig = __DIR__ . '/' . YII_ENV . '/web.php';

return \yii\helpers\ArrayHelper::merge(
    $config,
    file_exists($envConfig) ? require($envConfig) : []
);
