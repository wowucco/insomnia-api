<?php

namespace app\lastfm\repositories;

use app\lastfm\repositories\BaseRepository;
use yii\helpers\ArrayHelper;

class TrackRepository extends BaseRepository
{
    private const METHOD_TRACK_GET_INFO     = 'track.getInfo';
    private const METHOD_TRACK_GET_SIMILAR  = 'track.getsimilar';
    private const METHOD_TRACK_GET_TOP_TAGS = 'track.gettoptags';
    private const METHOD_TRACK_SEARCH       = 'track.search';

    /**
     * @param string|null $track (Required (unless mbid)] : The track name
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid  (Optional) : The musicbrainz id for the track
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return string
     */
    public function getInfo(string $track = null, string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];
        
        $this->useMbid($data, $mbid, $track, $artist);

        ArrayHelper::setValue($data, 'method', self::METHOD_TRACK_GET_INFO);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $track (Required (unless mbid)] : The track name
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid  (Optional) : The musicbrainz id for the track
     * @param int $limit (Optional) : Maximum number of similar tracks to return
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return string
     */
    public function getSimilar(string $track = null, string $artist = null, string $mbid = null, int $limit = 10, bool $autocorrect = true): string
    {
        $data = [];

        $this->useMbid($data, $mbid, $track, $artist);

        ArrayHelper::setValue($data, 'method', self::METHOD_TRACK_GET_SIMILAR);
        ArrayHelper::setValue($data, 'limit', $limit);
        ArrayHelper::setValue($data, 'auocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $track (Required (unless mbid)] : The track name
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid  (Optional) : The musicbrainz id for the track
     * @param bool $autocorrect (Optional) : Transform misspelled artist and track names into correct artist and track names,
     * returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @return string
     */
    public function getTopTags(string $track = null, string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];

        $this->useMbid($data, $mbid, $track, $artist);

        ArrayHelper::setValue($data, 'method', self::METHOD_TRACK_GET_TOP_TAGS);
        ArrayHelper::setValue($data, 'auocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string $track The track name
     * @param string|null $artist Narrow your search by specifying an artist.
     * @param int $limit The number of results to fetch per page. Defaults to 20.
     * @param int $page The page number to fetch. Defaults to first page.
     * @return mixed
     */
	public function search(string $track, string $artist = null, int $limit = 20, int $page = 1)
	{

	}

    /**
     * @param array $data
     * @param string $mbid
     * @param string $track
     * @param string $artist
     */
	protected function useMbid(array &$data, ?string $mbid, ?string $track, ?string $artist): void
    {
        if ($mbid) {
            ArrayHelper::setValue($data, 'mbid', $mbid);
        } elseif ($track && $artist) {
            ArrayHelper::setValue($data, 'track', $track);
            ArrayHelper::setValue($data, 'artist', $artist);
        } else {
            throw new \DomainException('Incorrect params');
        }
    }
}