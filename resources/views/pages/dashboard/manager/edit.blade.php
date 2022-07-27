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
                    <h1 class="m-0">Edit Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Employees</li>
                    <li class="breadcrumb-item active">Manager</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('manager.update', $manager->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $manager->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $manager->email }}" required>
                            </div>
                            <div class="form-group d-none">
                                <input id="password" type="password" name="password" class="form-control" value="{{ $manager->password }}" required autocomplete="new-password">
                            </div>
                            <div class="form-group d-none">
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control" value="{{ $manager->password }}" required autocomplete="new-password">
                            </div>
                            <div class="form-group d-none">
                                <select name="roles" class="form-control" required>
                                    <option value="{{ $manager->roles }}" selected>{{ $manager->roles }}</option>
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('manager.index') }}" class="btn btn-primary">Back</a>
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