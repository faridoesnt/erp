@extends('layouts.app')

@section('title')
    App - ERP System
@endsection

@section('content')
    <div class="container" style="margin-top: 70px;">
        @if ($weekday)
            <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="card shadow-sm w-50">
                    <div class="card-header">
                        Attendance
                    </div>
                    <div class="card-body text-center">
                        @if ($today_attendance_exists)
                            <p>Sudah Absen Hari Ini</p>
                        @else
                            @if($today_checkin_exists)
                                <form action="{{ route('checkOut') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="jam_keluar" value="{{ $now }}">
                                    <button class="btn btn-primary" type="submit">Check-Out</button>
                                </form>
                            @else
                                @if ($now >= $jam_masuk && $now <= $jam_keluar)
                                    <form action="{{ route('checkIn') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="jam_masuk" value="{{ $now }}">
                                        <button class="btn btn-primary" type="submit">Check-in</button>
                                    </form>
                                @else
                                    <p>Check-in Belum Tersedia</p>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @elseif($weekend)
            <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="card shadow-sm w-50">
                    <div class="card-header">
                        Attendance
                    </div>
                    <div class="card-body text-center">
                        It's the weekend now.
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection