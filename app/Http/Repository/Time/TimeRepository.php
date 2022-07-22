<?php

namespace App\Http\Repository\Time;

use App\Models\Time;

class TimeRepository implements TimeRepositoryInterface
{
    protected $times;

    public function __construct(Time $times)
    {
        $this->times = $times;
    }

    public function getTimeIn()
    {
        return $this->times->where('name', 'Jam Masuk')->pluck('time');
    }

    public function getTimeOut()
    {
        return $this->times->where('name', 'Jam Keluar')->pluck('time');
    }

    public function getTelat()
    {
        return $this->times->where('name', 'Telat')->pluck('time');
    }
}