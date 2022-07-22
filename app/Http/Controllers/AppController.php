<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Services\Time\TimeService;
use App\Http\Services\MyAccount\MyAccountService;
use App\Http\Services\Attendance\attendanceService;

class AppController extends Controller
{
    protected $myAccountService;
    protected $timeService;
    protected $attendanceService;

    public function __construct(MyAccountService $myAccountService, TimeService $timeService, attendanceService $attendanceService)
    {
        $this->myAccountService = $myAccountService;
        $this->timeService = $timeService;
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        $today_attendance_exists     = $this->attendanceService->getTodayAttendanceExists();
        $today_checkin_exists       = $this->attendanceService->getTodayCheckInExists();
        $weekend                    = Carbon::now()->isWeekend();
        $weekday                    = Carbon::now()->isWeekday();
        $now                        = Carbon::now()->format('H:i:s');
        $jam_masuk                  = $this->timeService->getTimeIn();
        $jam_keluar                 = $this->timeService->getTimeOut();

        return view('pages.app.app', [
            'weekend' => $weekend,
            'weekday' => $weekday,
            'now' => $now,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'today_attendance_exists' => $today_attendance_exists,
            'today_checkin_exists' => $today_checkin_exists,
        ]);
    }

    public function my_account()
    {
        $account = $this->myAccountService->myAccount();

        return view('pages.app.account', [
            'account' => $account
        ]);
    }

    public function check_in(Request $request)
    {
        try
        {
            $this->attendanceService->checkIn($request);

            return redirect()->back();
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function check_out(Request $request)
    {
        try
        {
            $this->attendanceService->checkOut($request);

            return redirect()->back();
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
