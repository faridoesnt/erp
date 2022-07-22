<?php

namespace App\Http\Services\Time;

use App\Http\Repository\Time\TimeRepository;

class TimeService
{
    protected $timeRepository;

    public function __construct(TimeRepository $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function getTimeIn()
    {
        $time_in = $this->timeRepository->getTimeIn();
        
        foreach($time_in as $value)
        {
            $result = $value;
        }

        return $result;
    }

    public function getTimeOut()
    {
        $time_out = $this->timeRepository->getTimeOut();
        
        foreach($time_out as $value)
        {
            $result = $value;
        }

        return $result;
    }
}