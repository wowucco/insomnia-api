<?php
/**
 * Created by PhpStorm.
 * User: wowucco
 * Date: 17.07.18
 * Time: 0:11
 */

namespace app\lastfm\useCases;

use app\lastfm\repositories\TrackRepository;

class TrackService
{
    private $trackRepository;

    public function __construct(TrackRepository $trackRepository)
    {
        $this->trackRepository = $trackRepository;
    }

    public function searchTrack()
    {
        return $this->trackRepository->search('prince');
    }
}