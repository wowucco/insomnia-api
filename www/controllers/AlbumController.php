<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 15.08.18
 * Time: 14:46
 */

namespace app\controllers;

use app\components\Controller;
use app\lastfm\repositories\AlbumRepository;

class AlbumController extends Controller
{
    private $albumRepository;

    public function __construct($id, $module, AlbumRepository $albumRepository, array $config = [])
    {
        $this->albumRepository = $albumRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionInfo($album = null, $artist = null, $mbid = null)
    {
        return $this->albumRepository->getInfo($album, $artist, $mbid);
    }

    public function actionTopTags($album = null, $artist = null, $mbid = null)
    {
        return $this->albumRepository->getTopTags($album, $artist, $mbid);
    }
}