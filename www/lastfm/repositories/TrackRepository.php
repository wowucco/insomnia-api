<?php

namespace app\lastfm\repositories;

use app\lastfm\repositories\BaseRepository;
use yii\helpers\ArrayHelper;

class TrackRepository extends BaseRepository
{
    private const METHOD_TRACK_GET_INFO     = 'track.getInfo';
    private const METHOD_TRACK_GET_SIMILAR  = 'track.getsimilar';
    private const METHOD_TRACK_GET_TOP_TAGS = 'track.gettoptags';

    /**
     * @param string $track The track name
     * @param string $artist The artist name
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return array
     */
    public function getInfo(string $track, string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_TRACK_GET_INFO,
            'artist'      => $artist,
            'track'       => $track,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $track The track name
     * @param string $artist The artist name
     * @param int $limit (Optional) : Maximum number of similar tracks to return
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return array
     */
    public function getSimilar(string $track, string $artist, int $limit = 10, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_TRACK_GET_SIMILAR,
            'artist'      => $artist,
            'track'       => $track,
            'limit'       => $limit,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $track The track name
     * @param string $artist The artist name
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return array
     */
    public function getTopTags(string $track, string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_TRACK_GET_TOP_TAGS,
            'artist'      => $artist,
            'track'       => $track,
            'autocorrect' => $autocorrect
        ]);
    }
}