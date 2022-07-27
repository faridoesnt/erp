@extends('layouts.app')

@section('title')
    App - ERP System
@endsection

@section('content')
    <div class="container" style="margin-top: 70px;">
        <div class="col-12">
            <div class="row justify-content-center align-items-center">
                <div class="card shadow-sm w-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Date</td>
                                        <td>Notes</td>
                                        <td>Check In</td>
                                        <td>Check Out</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('j F Y', strtotime($item->tanggal)) }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->jam_masuk }}</td>
                                            <td>{{ $item->jam_keluar }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection