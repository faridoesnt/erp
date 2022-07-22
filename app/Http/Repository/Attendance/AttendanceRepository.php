<?php

namespace App\Http\Repository\Attendance;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    protected $attendance;

    public function __construct(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }

    public function getTodayCheckInExists($data)
    {
        return $this->attendance->where('user_id', $data['user_id'])
                                ->where('tanggal', $data['tanggal'])
                                ->whereNotNull('jam_masuk')
                                ->exists();
    }

    public function getTodayAttendanceExists($data)
    {
        return $this->attendance->where('tanggal', $data['tanggal'])
                                ->where('user_id', $data['user_id'])
                                ->whereNotNull('jam_masuk')
                                ->whereNotNull('jam_keluar')
                                ->exists();
    }

    public function checkIn($data)
    {
        $attendance = new $this->attendance;

        $attendance->user_id = $data['user_id'];
        $attendance->keterangan = $data['keterangan'];
        $attendance->tanggal = $data['tanggal'];
        $attendance->jam_masuk = $data['jam_masuk'];

        $attendance->save();

        return $attendance;
    }

    public function checkOut($data)
    {
        $attendance = $this->attendance->where('user_id', $data['user_id'])
                                        ->where('tanggal', $data['tanggal'])
                                        ->first();

        $attendance->update([
            'jam_keluar' => $data['jam_keluar']
        ]);

        return $attendance;
    }
}