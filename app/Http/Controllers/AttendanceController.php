<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use Throwable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Services\Attendance\AttendanceService;

class AttendanceController extends Controller
{
    
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        $list = $this->attendanceService->getAll();

        return view('pages.dashboard.attendance.index', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->attendanceService->getUserAll();
        $now = Carbon::now()->format('H:i:s');

        return view('pages.dashboard.attendance.create', [
            'user' => $user,
            'now' => $now
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
        try
        {
            $this->attendanceService->checkIn($request);

            return redirect()->route('attendance.index');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $attendance = $this->attendanceService->getAttendanceID($id);
            $now = Carbon::now()->format('H:i:s');

            return view('pages.dashboard.attendance.edit', [
                'attendance' => $attendance,
                'now' => $now
            ]);
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceRequest $request, $id)
    {
        try
        {
            $this->attendanceService->updateAttendance($request, $id);

            return redirect()->route('attendance.index');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
