@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            @include('personnel.view')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
