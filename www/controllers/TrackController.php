<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 17.07.18
 * Time: 0:17
 */

namespace app\controllers;

use app\lastfm\repositories\TrackRepository;
use app\components\Controller;

class TrackController extends Controller
{
    private $trackRepository;

    public function __construct($id, $module, TrackRepository $trackRepository, array $config = [])
    {
        $this->trackRepository = $trackRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionInfo($track, $artist)
    {
        return $this->trackRepository->getInfo($track, $artist);
    }

    public function actionSimilar($track, $artist, $limit = 10)
    {
        return $this->trackRepository->getSimilar($track, $artist, $limit);
    }

    public function actionTopTags($track, $artist)
    {
        return $this->trackRepository->getTopTags($track, $artist);
    }
}