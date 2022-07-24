@extends('layouts.main')

@section('title')
    App - ERP System
@endsection

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-1">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-1">
                                        <label>:</label>
                                    </div>
                                    <div class="col-10">
                                        {{ $account->karyawan->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection