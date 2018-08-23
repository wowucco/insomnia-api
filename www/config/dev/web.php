<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 09.07.18
 * Time: 17:31
 */

$config = [
    'bootstrap' => ['debug', 'gii'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module'
        ],
        'gii' => [
            'class' => 'yii\gii\Module'
        ]
    ]
];

return $config;