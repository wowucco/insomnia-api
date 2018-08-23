<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 15.08.18
 * Time: 16:16
 */

namespace app\controllers;

use app\components\Controller;
use app\lastfm\repositories\ArtistRepository;

class ArtistController extends Controller
{
    private $artistRepository;

    public function __construct($id, $module, ArtistRepository $artistRepository, array $config = [])
    {
        $this->artistRepository = $artistRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionInfo($artist)
    {
        return $this->artistRepository->getInfo($artist);
    }

    public function actionSimilar($artist, $limit = 10)
    {
        return $this->artistRepository->getSimilar($artist, $limit);
    }

    public function actionTopAlbums($artist, $page = 1, $limit = 10)
    {
        return $this->artistRepository->getTopAlbums($artist, $page, $limit);
    }

    public function actionTopTracks($artist, $page = 1, $limit = 10)
    {
        return $this->artistRepository->getTopTracks($artist, $page, $limit);
    }

    public function actionTopTags($artist)
    {
        return $this->artistRepository->getTopTags($artist);
    }
}