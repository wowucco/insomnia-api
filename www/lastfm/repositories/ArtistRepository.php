<?php

namespace app\lastfm\repositories;

use yii\helpers\ArrayHelper;

class ArtistRepository extends BaseRepository
{
	private const METHOD_ARTIST_GET_INFO       = 'artist.getinfo';
	private const METHOD_ARTIST_GET_SIMILAR    = 'artist.getsimilar';
	private const METHOD_ARTIST_GET_TOP_ALBUMS = 'artist.gettopalbums';
	private const METHOD_ARTIST_GET_TOP_TRACKS = 'artist.gettoptracks';
	private const METHOD_ARTIST_GET_TOP_TAGS   = 'artist.gettoptags';

    /**
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid (Optional) : The musicbrainz id for the artist
     * @param bool $autocorrect (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response.
     * @return string
     */
	public function getInfo(string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];

        if ($artist) {
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing required params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ARTIST_GET_INFO);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid (Optional) : The musicbrainz id for the artist
     * @param int $limit (Optional) : Limit the number of similar artists returned
     * @param bool $autocorrect (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response.
     * @return string
     */
    public function getSimilar(string $artist = null, string $mbid = null, int $limit = 10, bool $autocorrect = true): string
    {
        $data = [];

        if ($artist) {
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing required params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ARTIST_GET_SIMILAR);
        ArrayHelper::setValue($data, 'limit', $limit);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid (Optional) : The musicbrainz id for the artist
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return string
     */
    public function getTopAlbums(string $artist = null, string $mbid = null, int $page = 1, int $limit = 10, bool $autocorrect = true): string
    {
        $data = [];

        if ($artist) {
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing required params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ARTIST_GET_TOP_ALBUMS);
        ArrayHelper::setValue($data, 'page', $page);
        ArrayHelper::setValue($data, 'limit', $limit);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid (Optional) : The musicbrainz id for the artist
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return string
     */
    public function getTopTracks(string $artist = null, string $mbid = null, int $page = 1, int $limit = 10, bool $autocorrect = true): string
    {
        $data = [];

        if ($artist) {
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing required params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ARTIST_GET_TOP_TRACKS);
        ArrayHelper::setValue($data, 'page', $page);
        ArrayHelper::setValue($data, 'limit', $limit);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid (Optional) : The musicbrainz id for the artist
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return string
     */
    public function getTopTags(string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];

        if ($artist) {
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing required params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ARTIST_GET_TOP_TAGS);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }
}