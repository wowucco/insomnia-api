<?php

namespace app\components;

use app\components\entities\Guest;
use yii\filters\Cors;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;

class Controller extends \yii\rest\Controller
{
    public function behaviors()
    {
        return [
            'cors' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*']
                ]
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
                'user' => \Yii::createObject(Guest::class)
            ],
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ]
            ]
        ];
    }
}