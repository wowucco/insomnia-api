<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 17.07.18
 * Time: 0:17
 */

namespace app\controllers;

use app\lastfm\repositories\TrackRepository;
use app\lastfm\useCases\TrackService;
use app\components\Controller;

class TrackController extends Controller
{
    private $trackService;
    private $trackRepository;

    public function __construct($id, $module, TrackRepository $trackRepository, TrackService $trackService, array $config = [])
    {
        $this->trackService = $trackService;
        $this->trackRepository = $trackRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionInfo($track = null, $artist = null, $mbid = null)
    {
        return $this->trackRepository->getInfo($track, $artist, $mbid);
    }

    public function actionSimilar($track = null, $artist = null, $mbid = null, $limit = 10)
    {
        return $this->trackRepository->getSimilar($track, $artist, $mbid, $limit);
    }

    public function actionTopTags($track = null, $artist = null, $mbid = null)
    {
        return $this->trackRepository->getTopTags($track, $artist, $mbid);
    }

    public function actionSearch()
    {
        return $this->trackService->searchTrack();
    }
}