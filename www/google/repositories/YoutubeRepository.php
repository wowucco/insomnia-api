<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 29.08.18
 * Time: 11:11
 */

namespace app\google\repositories;

class YoutubeRepository
{
    private $youtube;

    public function __construct(\Google_Service_YouTube $youtube)
    {
        $this->youtube = $youtube;
    }

    public function search($data)
    {
        $response = $this->youtube
            ->search
            ->listSearch('id,snippet', [
                'q' => $data
            ]);

        //var_dump($response);

        return $response;
    }
}