<?php

namespace App\Http\Repository\Attendance;

use App\Models\Attendance;
use App\Models\User;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    protected $attendance;
    protected $user;

    public function __construct(Attendance $attendance, User $user)
    {
        $this->attendance = $attendance;
        $this->user = $user;
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

    public function getList($data)
    {
        return $this->attendance->where('user_id', $data['user_id'])
                                ->orderBy('tanggal', 'asc')
                                ->paginate(10);
    }

    public function getAll()
    {
        return $this->attendance->with(['user'])->orderBy('tanggal', 'asc')->paginate(10);
    }

    public function getUserAll()
    {
        return $this->user->get();
    }

    public function getAttendanceID($id)
    {
        return $this->attendance->with(['user'])->findOrfail($id);
    }

    public function updateAttendance($request, $id)
    {
        $attendance = $this->attendance->findOrfail($id);

        $attendance->update([
            'jam_keluar' => $request->jam_keluar,
        ]);

        return $attendance;
    }
}