<?php

namespace app\controllers;

use Yii;
use app\lastfm\repositories\TagRepository;
use app\components\Controller;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct($id, $module, TagRepository $tagRepository, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return string
     */
    public function actionTopTags()
    {
        return $this->tagRepository->getTopTags();
    }

    /**
     * @param string $tagName
     * @return string
     */
    public function actionInfo(string $tagName)
    {
        return $this->tagRepository->getInfo($tagName);
    }

    /**
     * @param string $tagName
     * @return string
     */
    public function actionSimilar(string $tagName)
    {
        return $this->tagRepository->getSimilar($tagName);
    }

    /**
     * @param string $tagName
     * @return string
     */
    public function actionTopAlbums(string $tagName)
    {
        // TODO add limit and page number
        return $this->tagRepository->getTopAlbums($tagName);
    }

    /**
     * @param string $tagName
     * @return string
     */
    public function actionTopArtists(string $tagName)
    {
        // TODO add limit and page number
        return $this->tagRepository->getTopArtists($tagName);
    }

    /**
     * @param string $tagName
     * @return string
     */
    public function actionTopTracks(string $tagName)
    {
        // TODO add limit and page number
        return $this->tagRepository->getTopTracks($tagName);
    }
}