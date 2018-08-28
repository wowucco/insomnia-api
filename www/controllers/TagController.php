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
     * @param string $tag
     * @return string
     */
    public function actionInfo(string $tag)
    {
        return $this->tagRepository->getInfo($tag);
    }

    /**
     * @param string $tag
     * @return string
     */
    public function actionSimilar(string $tag)
    {
        return $this->tagRepository->getSimilar($tag);
    }

    /**
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function actionTopAlbums(string $tag, int $page = 1, int $limit = 50)
    {
        return $this->tagRepository->getTopAlbums($tag, $limit, $page);
    }

    /**
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function actionTopArtists(string $tag, int $page = 1, int $limit = 50)
    {
        return $this->tagRepository->getTopArtists($tag, $limit, $page);
    }

    /**
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function actionTopTracks(string $tag, int $page = 1, int $limit = 50)
    {
        return $this->tagRepository->getTopTracks($tag, $limit, $page);
    }
}