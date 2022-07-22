<?php

namespace App\Http\Repository\Time;

interface TimeRepositoryInterface
{
    public function getTimeIn();
    public function getTimeOut();
}