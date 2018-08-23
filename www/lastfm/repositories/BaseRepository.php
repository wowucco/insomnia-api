<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 14.07.18
 * Time: 22:05
 */

namespace app\lastfm\repositories;

use app\lastfm\services\LastfmApiClient;
use yii\helpers\ArrayHelper;

abstract class BaseRepository
{
    protected $client;

    public function __construct(LastfmApiClient $client)
    {
        $this->client = $client;
    }

    protected function useMbid(string $mbid, array &$data): void
    {
        ArrayHelper::setValue($data, 'mbid', $mbid);
    }

    protected function baseRequest(array $data): string
    {
        return \Yii::$app->cache->getOrSet(serialize($data), function() use ($data) {
            return $this->client
                ->request($data)
                ->content;
        }, 5 * 60);
    }
}