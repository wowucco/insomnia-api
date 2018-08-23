<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 09.07.18
 * Time: 17:04
 */

$params = require(__DIR__ . '/params.php');

$config = [
    'name' => 'Playrock',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['app\config\Bootstrap', 'log'],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "pgsql:host={$params['db']['host']};port={$params['db']['port']};dbname={$params['db']['dbName']}",
            'username' => $params['db']['username'],
            'password' => $params['db']['password'],
            'charset' => 'utf8',
            'schemaMap' => [
                'pgsql' => [
                    'class' => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'public'
                ]
            ]
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'keyPrefix' => 'playrock'
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => $params['redis']['host'],
            'port' => $params['redis']['port']
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ]
            ]
        ],
        'log' => [
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ]
    ],
    'params' => $params,
];

$envConfig = __DIR__ . '/' . YII_ENV . '/common.php';

return \yii\helpers\ArrayHelper::merge(
    $config,
    file_exists($envConfig) ? require($envConfig) : []
);