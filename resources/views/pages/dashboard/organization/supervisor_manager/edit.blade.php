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
                    <h1 class="m-0">Edit Organization</h1>
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
                <form action="{{ route('organization-supervisor-manager.update', $supervisor_manager->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label>Supervisor</label>
                                <select name="supervisor_id" class="form-control" required>
                                    @foreach ($data['supervisor'] as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $supervisor_manager->supervisor_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Manager</label>
                                <select name="manager_id" class="form-control" required>
                                    @foreach ($data['manager'] as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $supervisor_manager->manager_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('organization-supervisor-manager.index') }}" class="btn btn-primary">Back</a>
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