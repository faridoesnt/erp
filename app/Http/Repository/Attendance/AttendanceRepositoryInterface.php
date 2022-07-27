<?php

namespace App\Http\Repository\Attendance;

interface AttendanceRepositoryInterface
{
    public function getTodayAttendanceExists($data);
    public function getTodayCheckInExists($data);
    public function checkIn($data);
    public function checkOut($data);
    public function getList($data);
}