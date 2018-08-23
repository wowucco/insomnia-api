<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 16.08.18
 * Time: 10:39
 */

namespace app\controllers;

use app\components\Controller;
use app\lastfm\repositories\ChartRepository;

class ChartController extends Controller
{
    private $chartRepository;

    public function __construct($id, $module, ChartRepository $chartRepository, array $config = [])
    {
        $this->chartRepository = $chartRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionTopArtists($page = 1, $limit = 10)
    {
        return $this->chartRepository->getTopArtists($page, $limit);
    }

    public function actionTopTracks($page = 1, $limit = 10)
    {
        return $this->chartRepository->getTopTracks($page, $limit);
    }

    public function actionTopTags($page = 1, $limit = 10)
    {
        return $this->chartRepository->getTopTags($page, $limit);
    }

}