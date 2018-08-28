<?php 

namespace app\lastfm\repositories;

class TagRepository extends BaseRepository
{
    private const METHOD_TAG_GET_INFO              = 'tag.getinfo';
    private const METHOD_TAG_GET_SIMILAR           = 'tag.getsimilar';
    private const METHOD_TAG_GET_TOP_ALBUMS        = 'tag.gettopalbums';
    private const METHOD_TAG_GET_TOP_ARTISTS       = 'tag.gettopartists';
    private const METHOD_TAG_GET_TOP_TAGS          = 'tag.getTopTags';
    private const METHOD_TAG_GET_TOP_TRACKS        = 'tag.getTopTracks';

	public function getTopTags(): array
    {
        return $this->baseRequest(['method' => self::METHOD_TAG_GET_TOP_TAGS]);
    }

    /**
     * @param string $tag (Required) : The tag name
     * @return array
     */
    public function getInfo(string $tag): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_INFO,
            'tag'    => $tag
        ]);
    }

    /**
     * @param string $tag (Required) : The tag name
     * @return array
     */
    public function getSimilar(string $tag): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_SIMILAR,
            'tag'    => $tag
        ]);
    }

    /**
     * @param string $tag (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return array
     */
    public function getTopAlbums(string $tag, int $limit = 50, int $page = 1): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_ALBUMS,
            'tag'    => $tag,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }

    /**
     * @param string $tag (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return array
     */
    public function getTopArtists(string $tag, int $limit = 50, int $page = 1): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_ARTISTS,
            'tag'    => $tag,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }

    /**
     * @param string $tag (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return array
     */
    public function getTopTracks(string $tag, int $limit = 50, int $page = 1): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_TRACKS,
            'tag'    => $tag,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }
}