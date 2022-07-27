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
                    <h1 class="m-0">Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Employees</li>
                    <li class="breadcrumb-item active">Karyawan</li>
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
                        <a href="{{ route('karyawan.create') }}" class="btn btn-success">Create Karyawan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Manager</td>
                                        <td style="width: 20%;">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($karyawan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @foreach ($manager as $value)
                                                    @foreach ($value as $i)
                                                        @if ($item->id == $i->karyawan_id)
                                                            {{ $i->manager->name }}
                                                            <form action="{{ route('delete_karyawan_manager', $i->id) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning">Delete</button>
                                                            </form>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('setManager', $item->id) }}" class="btn btn-info mb-1">Set Manager</a>
                                                <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-primary mb-1">Edit</a>
                                                <form action="{{ route('karyawan.destroy', $item->id) }}'" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $karyawan->links() }}
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection