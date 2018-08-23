<?php

namespace app\lastfm\repositories;

use yii\helpers\ArrayHelper;

class AlbumRepository extends BaseRepository
{
	private const METHOD_ALBUM_GET_INFO     = 'album.getinfo';
	private const METHOD_ALBUM_GET_TOP_TAGS = 'album.gettoptags';

    /**
     * @param string|null $album (Required (unless mbid)] : The album name
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid  (Optional) : The musicbrainz id for the album
     * @param bool $autocorrect (Optional) : Transform misspelled artist and album names into correct artist and album names,
     * returning the correct version instead. The corrected artist and album name will be returned in the response.
     * @return string
     */
    public function getInfo(string $album = null, string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];

        if ($album && $artist) {
            ArrayHelper::setValue($data, 'album', $album);
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ALBUM_GET_INFO);
        ArrayHelper::setValue($data, 'autocorrect', $autocorrect);

        return $this->baseRequest($data);
    }

    /**
     * @param string|null $album (Required (unless mbid)] : The album name
     * @param string|null $artist (Required (unless mbid)] : The artist name
     * @param string|null $mbid  (Optional) : The musicbrainz id for the album
     * @param bool $autocorrect (Optional) : Transform misspelled artist and album names into correct artist and album names,
     * returning the correct version instead. The corrected artist and album name will be returned in the response.
     * @return string
     */
    public function getTopTags(string $album = null, string $artist = null, string $mbid = null, bool $autocorrect = true): string
    {
        $data = [];

        if ($album && $artist) {
            ArrayHelper::setValue($data, 'album', $album);
            ArrayHelper::setValue($data, 'artist', $artist);
        } elseif ($mbid) {
            $this->useMbid($mbid, $data);
        } else {
            throw new \DomainException('missing params');
        }

        ArrayHelper::setValue($data, 'method', self::METHOD_ALBUM_GET_TOP_TAGS);
        ArrayHelper::setValue($data, 'auocorrect', $autocorrect);

        return $this->baseRequest($data);
    }
}