<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 13.08.18
 * Time: 15:53
 */

namespace app\components\gateways;

use app\components\gateways\ApiClientInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\httpclient\Client;
use yii\httpclient\Request;
use yii\httpclient\Response;

abstract class BaseHttpClient implements ApiClientInterface
{
    protected const HTTP_METHOD_GET  = 'GET';
    protected const HTTP_METHOD_POST = 'POST';

    abstract protected function getClient(): Client;

    abstract protected function getRequestConfig(): array;

    protected function createRequest(array $config = []): Request
    {
        $client = $this->getClient();
        $client->requestConfig = ArrayHelper::merge($client->requestConfig, $this->getRequestConfig(), $config);

        return $client->createRequest();
    }

    public function request(array $data = [], string $method = null, array $config = []): Response
    {
        $request = $this->createRequest($config);

        if ($method) {
            $request->setMethod($method);
        }

        $method = $request->getMethod();

        if ($data && $method === self::HTTP_METHOD_GET) {
            $request->addData($data);
        } elseif ($data && $method === self::HTTP_METHOD_POST) {
            $request->setContent(Json::encode($data));
        }

        return $request->send();
    }
}