<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 13.08.18
 * Time: 17:48
 */

namespace app\components\gateways;

use yii\httpclient\Response;

interface ApiClientInterface
{
    public function request(array $data = [], string $method = null, array $config = []): Response;
}