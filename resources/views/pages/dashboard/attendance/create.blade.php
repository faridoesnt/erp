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
                    <h1 class="m-0">Create Attendance</h1>
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
                <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
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
                                <select name="user_id" class="form-control" required>
                                    <option value="" selected>Choose User</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->roles }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-none">
                                <input type="text" name="jam_masuk" value="{{ $now }}">
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('attendance.index') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection