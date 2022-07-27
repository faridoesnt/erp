<?php

namespace App\Http\Services\Attendance;

use Illuminate\Support\Facades\Auth;
use App\Http\Repository\Time\TimeRepository;
use App\Http\Repository\Attendance\AttendanceRepository;

class attendanceService
{
    protected $attendaceRepository;
    protected $timeRepository;

    public function __construct(AttendanceRepository $attendaceRepository, TimeRepository $timeRepository)
    {
        $this->attendaceRepository = $attendaceRepository;
        $this->timeRepository = $timeRepository;
    }

    public function checkIn($request)
    {
        $telat = $this->timeRepository->getTelat();

        foreach($telat as $value)
        {
            $telat = $value;
        }

        if($request->jam_masuk >= $telat)
        {
            $data['user_id'] = $request->user_id;
            $data['keterangan'] = 'Telat';
            $data['tanggal'] = date('Y-m-d');
            $data['jam_masuk'] = $request->jam_masuk;

            return $this->attendaceRepository->checkIn($data);
        }
        elseif($request->jam_masuk < $telat)
        {
            $data['user_id'] = $request->user_id;
            $data['keterangan'] = 'Masuk';
            $data['tanggal'] = date('Y-m-d');
            $data['jam_masuk'] = $request->jam_masuk;

            return $this->attendaceRepository->checkIn($data);
        }
    }

    public function checkOut($request)
    {
        $data['user_id'] = $request->user_id;
        $data['tanggal'] = date('Y-m-d');
        $data['jam_keluar'] = $request->jam_keluar;

        return $this->attendaceRepository->checkOut($data);
    }

    public function getTodayAttendanceExists()
    {
        $data['tanggal'] = date('Y-m-d');
        $data['user_id'] = Auth::user()->id;
        
        return $this->attendaceRepository->getTodayAttendanceExists($data);
    }

    public function getTodayCheckInExists()
    {
        $data['tanggal'] = date('Y-m-d');
        $data['user_id'] = Auth::user()->id;
        
        return $this->attendaceRepository->getTodayCheckInExists($data);
    }

    public function getList()
    {
        $data['user_id'] = Auth::user()->id;

        return $this->attendaceRepository->getList($data);
    }

    public function getAll()
    {
        return $this->attendaceRepository->getAll();
    }

    public function getUserAll()
    {
        return $this->attendaceRepository->getUserAll();
    }

    public function getAttendanceID($id)
    {
        return $this->attendaceRepository->getAttendanceID($id);
    }

    public function updateAttendance($request, $id)
    {
        return $this->attendaceRepository->updateAttendance($request, $id);
    }
}