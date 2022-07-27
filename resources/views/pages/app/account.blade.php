@extends('layouts.app')

@section('title')
    App - ERP System
@endsection

@section('content')
    <div class="container" style="margin-top: 70px;">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Profile
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name :</label>
                                @can('karyawan')
                                    <input type="text" class="form-control" value={{ $account['karyawan']->name }} disabled>
                                @endcan
                                @can('manager')
                                    <input type="text" class="form-control" value={{ $account['manager']->name }} disabled>
                                @endcan
                                @can('supervisor')
                                    <input type="text" class="form-control" value={{ $account['supervisor']->name }} disabled>
                                @endcan
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                @can('karyawan')
                                    <input type="text" class="form-control" value={{ $account['karyawan']->email }} disabled>
                                @endcan
                                @can('manager')
                                    <input type="text" class="form-control" value={{ $account['manager']->email }} disabled>
                                @endcan
                                @can('supervisor')
                                    <input type="text" class="form-control" value={{ $account['supervisor']->email }} disabled>
                                @endcan
                            </div>
                            <div class="form-group">
                                <label>Position :</label>
                                @can('karyawan')
                                    <input type="text" class="form-control" value={{ $account['karyawan']->roles }} disabled>
                                @endcan
                                @can('manager')
                                    <input type="text" class="form-control" value={{ $account['manager']->roles }} disabled>
                                @endcan
                                @can('supervisor')
                                    <input type="text" class="form-control" value={{ $account['supervisor']->roles }} disabled>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    @can('karyawan')
                        <div class="card">
                            <div class="card-header">
                                Your Manager
                            </div>
                            <div class="card-body">
                                @foreach ($account['manager'] as $item)
                                    <div class="form-group">
                                        {{ $loop->iteration }}. {{ $item->manager->name ?? ''}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endcan
                    @can('manager')
                        <div class="card">
                            <div class="card-header">
                                Your Karyawan
                            </div>
                            <div class="card-body">
                                @foreach ($account['karyawan'] as $item)
                                    <div class="form-group">
                                        {{ $loop->iteration }}. {{ $item->karyawan->name ?? ''}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endcan
                    @can('supervisor')
                        <div class="card">
                            <div class="card-header">
                                Your Manager
                            </div>
                            <div class="card-body">
                                @foreach ($account['manager'] as $item)
                                    <div class="form-group">
                                        {{ $loop->iteration }}. {{ $item->manager->name ?? ''}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="col-6">
                    @can('manager')
                        <div class="card">
                            <div class="card-header">
                                Your Supervisor
                            </div>
                            <div class="card-body">
                                @foreach ($account['supervisor'] as $item)
                                    <div class="form-group">
                                        {{ $loop->iteration }}. {{ $item->supervisor->name ?? ''}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection