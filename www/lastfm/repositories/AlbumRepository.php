<?php

namespace app\lastfm\repositories;

class AlbumRepository extends BaseRepository
{
	private const METHOD_ALBUM_GET_INFO     = 'album.getinfo';
	private const METHOD_ALBUM_GET_TOP_TAGS = 'album.gettoptags';

    /**
     * @param string $album The album name
     * @param string $artist The artist name
     * @param bool $autocorrect (Optional) : Transform misspelled artist and album names into correct artist and album names,
     * returning the correct version instead. The corrected artist and album name will be returned in the response.
     * @return array
     */
    public function getInfo(string $album, string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ALBUM_GET_INFO,
            'album'       => $album,
            'artist'      => $artist,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $album The album name
     * @param string $artist The artist name
     * @param bool $autocorrect (Optional) : Transform misspelled artist and album names into correct artist and album names,
     * returning the correct version instead. The corrected artist and album name will be returned in the response.
     * @return array
     */
    public function getTopTags(string $album, string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ALBUM_GET_TOP_TAGS,
            'album'       => $album,
            'artist'      => $artist,
            'autocorrect' => $autocorrect
        ]);
    }
}