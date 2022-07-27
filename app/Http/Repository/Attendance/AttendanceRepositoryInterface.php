<?php

namespace App\Http\Repository\Attendance;

interface AttendanceRepositoryInterface
{
    public function getTodayAttendanceExists($data);
    public function getTodayCheckInExists($data);
    public function checkIn($data);
    public function checkOut($data);
    public function getList($data);
    public function getAll();
    public function getUserAll();
    public function getAttendanceID($id);
    public function updateAttendance($request, $id);
}