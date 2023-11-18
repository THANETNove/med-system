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
                                <h1 class="card-title text-primary ">ข้อมูลบุคลากร</h1>
                                <a href="{{ url('export/pdf') }}"
                                    class="btn rounded-pill btn-outline-info mb-3">รายงานข้อมูลบุคลากร</a>
                                @if (session('message'))
                                    <p class="message-text text-center mt-4"> {{ session('message') }}</p>
                                @endif

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รหัสพนักงาน</th>
                                                <th>ชื่อ นามสกุล</th>
                                                <th>เบอร์โทร</th>
                                                <th>สถานะพนักงาน</th>
                                                <th>สถานะ</th>
                                                @if (Auth::user()->status == '2')
                                                    <th>Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($data->where('status', '2')->sortByDesc('created_at') as $da)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $da->employee_id }}</td>
                                                    <td>{{ $da->prefix }} {{ $da->first_name }} {{ $da->last_name }}</td>
                                                    <td>{{ $da->phone_number }}</td>
                                                    <td>หัวหน้าวัสดุ</td>
                                                    <td>
                                                        @if ($da->statusEmployee == 'on')
                                                            <span class="badge bg-label-success me-1">เป็นพนักงาน</span>
                                                        @else
                                                            <span
                                                                class="badge bg-label-warning me-1">ไม่ได้เป็นพนักงาน</span>
                                                        @endif

                                                    </td>
                                                    @if (Auth::user()->status == '2')
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('personnel-show', $da->id) }}"><i
                                                                            class='bx bxs-show'></i> View</a>
                                                                    @if ($da->statusEmployee == 'on')
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-edit', $da->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        @if (Auth::user()->id != $da->id)
                                                                            <a class="dropdown-item"
                                                                                href="{{ url('personnel-destroy', $da->id) }}"><i
                                                                                    class="bx bx-trash me-1"></i> Delete</a>
                                                                        @endif
                                                                    @else
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-update-status', $da->id) }}">
                                                                            <i class='bx bx-up-arrow-circle'></i> update
                                                                            status</a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            @foreach ($data->where('status', '1')->sortByDesc('created_at') as $da)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $da->employee_id }}</td>
                                                    <td>{{ $da->prefix }} {{ $da->first_name }} {{ $da->last_name }}
                                                    </td>
                                                    <td>{{ $da->phone_number }}</td>
                                                    <td>หัวหน้าวัสดุ</td>
                                                    <td>
                                                        @if ($da->statusEmployee == 'on')
                                                            <span class="badge bg-label-success me-1">เป็นพนักงาน</span>
                                                        @else
                                                            <span
                                                                class="badge bg-label-warning me-1">ไม่ได้เป็นพนักงาน</span>
                                                        @endif

                                                    </td>
                                                    @if (Auth::user()->status == '2')
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('personnel-show', $da->id) }}"><i
                                                                            class='bx bxs-show'></i> View</a>
                                                                    @if ($da->statusEmployee == 'on')
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-edit', $da->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        @if (Auth::user()->id != $da->id)
                                                                            <a class="dropdown-item"
                                                                                href="{{ url('personnel-destroy', $da->id) }}"><i
                                                                                    class="bx bx-trash me-1"></i> Delete</a>
                                                                        @endif
                                                                    @else
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-update-status', $da->id) }}">
                                                                            <i class='bx bx-up-arrow-circle'></i> update
                                                                            status</a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            @foreach ($data->where('status', '0')->sortByDesc('created_at') as $da)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $da->employee_id }}</td>
                                                    <td>{{ $da->prefix }} {{ $da->first_name }} {{ $da->last_name }}
                                                    </td>
                                                    <td>{{ $da->phone_number }}</td>
                                                    <td>หัวหน้าวัสดุ</td>
                                                    <td>
                                                        @if ($da->statusEmployee == 'on')
                                                            <span class="badge bg-label-success me-1">เป็นพนักงาน</span>
                                                        @else
                                                            <span
                                                                class="badge bg-label-warning me-1">ไม่ได้เป็นพนักงาน</span>
                                                        @endif

                                                    </td>
                                                    @if (Auth::user()->status == '2')
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('personnel-show', $da->id) }}"><i
                                                                            class='bx bxs-show'></i> View</a>
                                                                    @if ($da->statusEmployee == 'on')
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-edit', $da->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        @if (Auth::user()->id != $da->id)
                                                                            <a class="dropdown-item"
                                                                                href="{{ url('personnel-destroy', $da->id) }}"><i
                                                                                    class="bx bx-trash me-1"></i> Delete</a>
                                                                        @endif
                                                                    @else
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('personnel-update-status', $da->id) }}">
                                                                            <i class='bx bx-up-arrow-circle'></i>
                                                                            update
                                                                            status</a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
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
