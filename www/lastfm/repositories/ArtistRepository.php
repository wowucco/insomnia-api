<?php

namespace app\lastfm\repositories;

class ArtistRepository extends BaseRepository
{
	private const METHOD_ARTIST_GET_INFO       = 'artist.getinfo';
	private const METHOD_ARTIST_GET_SIMILAR    = 'artist.getsimilar';
	private const METHOD_ARTIST_GET_TOP_ALBUMS = 'artist.gettopalbums';
	private const METHOD_ARTIST_GET_TOP_TRACKS = 'artist.gettoptracks';
	private const METHOD_ARTIST_GET_TOP_TAGS   = 'artist.gettoptags';

    /**
     * @param string $artist The artist name
     * @param bool $autocorrect (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response.
     * @return array
     */
	public function getInfo(string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ARTIST_GET_INFO,
            'artist'      => $artist,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $artist The artist name
     * @param int $limit (Optional) : Limit the number of similar artists returned
     * @param bool $autocorrect (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response.
     * @return array
     */
    public function getSimilar(string $artist, int $limit = 10, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ARTIST_GET_SIMILAR,
            'artist'      => $artist,
            'limit'       => $limit,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $artist The artist name
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return array
     */
    public function getTopAlbums(string $artist, int $page = 1, int $limit = 10, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ARTIST_GET_TOP_ALBUMS,
            'artist'      => $artist,
            'page'        => $page,
            'limit'       => $limit,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $artist The artist name
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return array
     */
    public function getTopTracks(string $artist, int $page = 1, int $limit = 10, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ARTIST_GET_TOP_TRACKS,
            'artist'      => $artist,
            'page'        => $page,
            'limit'       => $limit,
            'autocorrect' => $autocorrect
        ]);
    }

    /**
     * @param string $artist The artist name
     * @param bool $autocorrect  (Optional) : Transform misspelled artist names into correct artist names, returning
     * the correct version instead. The corrected artist name will be returned in the response
     * @return array
     */
    public function getTopTags(string $artist, bool $autocorrect = true): array
    {
        return $this->baseRequest([
            'method'      => self::METHOD_ARTIST_GET_TOP_TAGS,
            'artist'      => $artist,
            'autocorrect' => $autocorrect
        ]);
    }
}