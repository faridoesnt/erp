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
                    <h1 class="m-0">Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Master Data</li>
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
                        <a href="{{ route('manager.create') }}" class="btn btn-success">Create Manager</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Karyawan</td>
                                        <td>Supervisor</td>
                                        <td style="width: 20%;">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($manager as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @foreach ($karyawan as $value)
                                                    @foreach ($value as $i)
                                                        @if ($item->id == $i->manager_id)
                                                            <ul>
                                                                <li>
                                                                    {{ $i->karyawan->name }}
                                                                    <form action="{{ route('delete_karyawan_manager', $i->id) }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-warning">Delete</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($supervisor as $value)
                                                    @foreach ($value as $i)
                                                        @if ($item->id == $i->manager_id)
                                                            {{ $i->supervisor->name }}
                                                            <form action="{{ route('delete_manager_supervisor', $i->id) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning">Delete</button>
                                                            </form>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('setSupervisor', $item->id) }}" class="btn btn-info mb-1">Set Supervisor</a>
                                                <a href="{{ route('setKaryawan', $item->id) }}" class="btn btn-secondary mb-1">Set Karyawan</a>
                                                <a href="{{ route('manager.edit', $item->id) }}" class="btn btn-primary mb-1">Edit</a>
                                                <form action="{{ route('manager.destroy', $item->id) }}'" method="POST">
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
                            {{ $manager->links() }}
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection