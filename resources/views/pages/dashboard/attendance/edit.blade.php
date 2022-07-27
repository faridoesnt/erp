@extends('layouts.dashboard')

@section('title')
    ERP - System
@endsection

@section('content')
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Attendance</h1>
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
                <form action="{{ route('attendance.update', $attendance->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $attendance->user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" value="{{ $attendance->user->roles }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Check In</label>
                                <input type="text" class="form-control" value="{{ $attendance->jam_masuk }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Check Out</label>
                                <input type="text" class="form-control" value="{{ $now }}" disabled>
                                <input type="hidden" name="jam_keluar" value="{{ $now }}">
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('attendance.index') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection