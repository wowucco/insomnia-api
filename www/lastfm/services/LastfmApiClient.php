<?php 

namespace app\lastfm\services;

use app\components\gateways\BaseHttpClient;
use yii\httpclient\Client;

class LastfmApiClient extends BaseHttpClient
{
    private $client;
    private $baseConfig;

    public function __construct(Client $client, array $baseConfig = [])
    {
        $this->client = $client;
        $this->baseConfig = $baseConfig;
    }

    protected function getClient(): Client
    {
        return $this->client;
    }

    protected function getRequestConfig(): array
    {
        return $this->baseConfig;
    }
}