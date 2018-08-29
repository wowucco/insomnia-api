<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 28.08.18
 * Time: 16:02
 */

namespace app\components\entities;

use Yii;
use yii\filters\RateLimitInterface;

class Guest implements RateLimitInterface
{
    public $rateLimit = 100;
    public $expire = 200;

    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, $this->expire];
    }

    public function loadAllowance($request, $action)
    {
        $data = Yii::$app->cache->getOrSet($request->getUserIP(), function() {
            return [
                'allowance' => $this->rateLimit,
                'timestamp' => time()
            ];
        }, $this->expire);

        return [$data['allowance'], $data['timestamp']];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $value = [
            'allowance' => $allowance,
            'timestamp' => $timestamp
        ];

        Yii::$app->cache->set($request->getUserIP(), $value, $this->expire);
    }
}