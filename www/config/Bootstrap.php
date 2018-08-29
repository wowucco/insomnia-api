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
use Google_Service_YouTube;
use Google_Client;

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

        $container->setSingleton(Google_Client::class, function () use ($app) {
            return new Google_Client(['developer_key' => $app->params['google']['developerKey']]);
        });

        $container->setSingleton(Google_Service_YouTube::class, function ($container) {
            return new Google_Service_YouTube($container->get(Google_Client::class));
        });
    }
}