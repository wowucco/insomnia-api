<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 29.08.18
 * Time: 11:18
 */

namespace app\controllers;

use app\components\Controller;
use app\google\repositories\YoutubeRepository;

class YoutubeController extends Controller
{
    private $youtubeRepository;

    public function __construct($id, $module, YoutubeRepository $youtubeRepository, array $config = [])
    {
        $this->youtubeRepository = $youtubeRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionSearch(string $data)
    {
        return $this->youtubeRepository->search($data);
    }
}