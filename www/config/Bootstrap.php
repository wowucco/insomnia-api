<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 13.07.18
 * Time: 23:28
 */

namespace app\config;

use app\lastfm\services\LastfmApiClient;
use yii\base\BootstrapInterface;
use yii\httpclient\Client;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(LastfmApiClient::class, function () use ($app) {
            return new LastfmApiClient(
                new Client(['baseUrl' => $app->params['lastfm']['apiUrl']]),
                [

                    'data' => [
                        'format'  => 'json',
                        'api_key' => $app->params['lastfm']['apiKey']
                    ]
                ]
            );
        });
    }
}