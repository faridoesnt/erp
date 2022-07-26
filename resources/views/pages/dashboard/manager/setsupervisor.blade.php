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
                    <h1 class="m-0">Create Organization</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Organization</li>
                    <li class="breadcrumb-item active">Supervisor - Manager</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('storeSupervisor') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group d-none">
                                <label>Manager</label>
                                <select name="manager_id" class="form-control" required>
                                    <option value="{{ $id }}">{{ $id }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supervisor</label>
                                <select name="supervisor_id" class="form-control" required>
                                    <option value="">Choose Supervisor</option>
                                    @foreach ($data['supervisor'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-right">
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