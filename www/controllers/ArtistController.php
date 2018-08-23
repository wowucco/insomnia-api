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

    public function actionInfo($artist = null, $mbid = null)
    {
        return $this->artistRepository->getInfo($artist, $mbid);
    }

    public function actionSimilar($artist = null, $mbid = null, $limit = 10)
    {
        return $this->artistRepository->getSimilar($artist, $mbid, $limit);
    }

    public function actionTopAlbums($artist = null, $mbid = null, $page = 1, $limit = 10)
    {
        return $this->artistRepository->getTopAlbums($artist, $mbid, $page, $limit);
    }

    public function actionTopTracks($artist = null, $mbid = null, $page = 1, $limit = 10)
    {
        return $this->artistRepository->getTopTracks($artist, $mbid, $page, $limit);
    }

    public function actionTopTags($artist = null, $mbid = null)
    {
        return $this->artistRepository->getTopTags($artist, $mbid);
    }
}