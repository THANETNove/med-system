@extends('layouts.app')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">

                            <div class="card-body">
                                <h1 class="card-title text-primary ">ข้อมูลวัสดุ</h1>
                                <a href="{{ url('personnel-export/pdf') }}"
                                    class="btn rounded-pill btn-outline-info mb-3">รายงานข้อมูลวัสดุ</a>
                                @if (session('message'))
                                    <p class="message-text text-center mt-4"> {{ session('message') }}</p>
                                @endif

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อ</th>
                                                <th>จำนวนวัสดุ</th>
                                                <th>จำนวนนับวัสดุ</th>
                                                <th>ชำรุด</th>
                                                <th>แทงจำหน่าย</th>
                                                <th>สิ้นเปลือง</th>
                                                <th>ซ่อม</th>
                                                <th>ที่จัดเก็บ</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($data as $da)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $da->material_name }}</td>
                                                    <td>{{ $da->material_number }}</td>
                                                    <td>{{ $da->name_material_count }}</td>
                                                    <td>{{ $da->damaged_number }}</td>
                                                    <td>{{ $da->bet_on_distribution_number }}</td>
                                                    <td>{{ $da->wasteful_number }}</td>
                                                    <td>{{ $da->repair_number }}</td>
                                                    <td>{{ $da->building_name }} &nbsp;{{ $da->floor }} &nbsp;
                                                        {{ $da->room_name }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ url('material-edit', $da->id) }}"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    <div class="mt-5">
                                        {!! $data->links() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Layout wrapper -->
@endsection
