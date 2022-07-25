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
                    <h1 class="m-0">Supervisor - Manager</h1>
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
                        <a href="{{ route('organization-supervisor-manager.create') }}" class="btn btn-success">Create Organization</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Supervisor</td>
                                        <td>Manager</td>
                                        <td style="width: 20%;">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($supervisor_manager as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->supervisor->name }}</td>
                                            <td>{{ $item->manager->name }}</td>
                                            <td>
                                                <a href="{{ route('organization-supervisor-manager.edit', $item->id) }}" class="btn btn-primary mb-1">Edit</a>
                                                <form action="{{ route('organization-supervisor-manager.destroy', $item->id) }}'" method="POST">
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
                            {{ $supervisor_manager->links() }}
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection