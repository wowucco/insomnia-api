<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 16.08.18
 * Time: 10:26
 */

namespace app\lastfm\repositories;

class ChartRepository extends BaseRepository
{
    private const METHOD_CHART_GET_TOP_ARTISTS = 'chart.gettopartists';
    private const METHOD_CHART_GET_TOP_TRACKS  = 'chart.gettoptracks';
    private const METHOD_CHART_GET_TOP_TAGS    = 'chart.gettoptags';

    /**
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @return array
     */
    public function getTopArtists(int $page = 1, int $limit = 10): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_CHART_GET_TOP_ARTISTS,
            'page'   => $page,
            'limit'  => $limit
        ]);
    }

    /**
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @return array
     */
    public function getTopTracks(int $page = 1, int $limit = 10): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_CHART_GET_TOP_TRACKS,
            'page'   => $page,
            'limit'  => $limit
        ]);
    }

    /**
     * @param int $page (Optional) : The page number to fetch. Defaults to first page.
     * @param int $limit (Optional) : The number of results to fetch per page. Defaults to 10.
     * @return array
     */
    public function getTopTags(int $page = 1, int $limit = 10): array
    {
        return $this->baseRequest([
            'method' => self::METHOD_CHART_GET_TOP_TAGS,
            'page'   => $page,
            'limit'  => $limit
        ]);
    }
}