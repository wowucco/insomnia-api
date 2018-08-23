<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'insomnia-console',
    'controllerNamespace' => 'app\commands'
];

$envConfig = __DIR__ . '/' . YII_ENV . '/console.php';

return \yii\helpers\ArrayHelper::merge(
    $config,
    file_exists($envConfig) ? require($envConfig) : []
);
