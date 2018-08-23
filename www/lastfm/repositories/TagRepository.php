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
    private const METHOD_TAG_GET_WEEKLY_CHART_LIST = 'tag.getWeeklyChartList';

	public function getTopTags(): string
    {
        return $this->baseRequest(['method' => self::METHOD_TAG_GET_TOP_TAGS]);
    }

    /**
     * @param string $tagName (Required) : The tag name
     * @return string
     */
    public function getInfo(string $tagName): string
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_INFO,
            'tag'    => $tagName
        ]);
    }

    /**
     * @param string $tagName (Required) : The tag name
     * @return string
     */
    public function getSimilar(string $tagName): string
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_SIMILAR,
            'tag'    => $tagName
        ]);
    }

    /**
     * @param string $tagName (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return string
     */
    public function getTopAlbums(string $tagName, int $limit = 50, int $page = 1): string
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_ALBUMS,
            'tag'    => $tagName,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }

    /**
     * @param string $tagName (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return string
     */
    public function getTopArtists(string $tagName, int $limit = 50, int $page = 1): string
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_ARTISTS,
            'tag'    => $tagName,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }

    /**
     * @param string $tagName (Required) : The tag name
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 50.
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @return string
     */
    public function getTopTracks(string $tagName, int $limit = 50, int $page = 1): string
    {
        return $this->baseRequest([
            'method' => self::METHOD_TAG_GET_TOP_TRACKS,
            'tag'    => $tagName,
            'limit'  => $limit,
            'page'   => $page
        ]);
    }
}