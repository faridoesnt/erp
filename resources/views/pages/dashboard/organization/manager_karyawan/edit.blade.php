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
                    <li class="breadcrumb-item active">Manager - Karyawan</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('organization-manager-karyawan.update', $manager_karyawan->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label>Manager</label>
                                <select name="manager_id" class="form-control" required>
                                    @foreach ($data['manager'] as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $manager_karyawan->manager_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Karyawan</label>
                                <select name="karyawan_id" class="form-control" required>
                                    @foreach ($data['karyawan'] as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $manager_karyawan->karyawan_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('organization-manager-karyawan.index') }}" class="btn btn-primary">Back</a>
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