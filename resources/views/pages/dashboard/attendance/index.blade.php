@extends('layouts.dashboard')

@section('title')
    Dashboard - ERP System
@endsection

@section('content')
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Attendance</li>
                    <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('attendance.create') }}" class="btn btn-success">Create Attendance</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Date</td>
                                        <td>Name</td>
                                        <td>Position</td>
                                        <td>Notes</td>
                                        <td>Check In</td>
                                        <td>Check Out</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('j F Y', strtotime($item->tanggal)) }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->roles }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->jam_masuk }}</td>
                                            <td>{{ $item->jam_keluar ?? ''}}</td>
                                            <td>
                                                <a href="{{ route('attendance.edit', $item->id) }}" class="btn btn-primary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection