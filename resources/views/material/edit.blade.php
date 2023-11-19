@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-12 mb-4 order-0">

                <div class="card ">
                    <div class="card-body">
                        <h1 class="card-title text-primary ">เเก้ไขระบบลงทะเบียนวัสดุ</h1>
                        <form class="user" id="myForm" method="POST"
                        action="{{ route('material-update', $mate['id']) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="material_name" class="form-label">ชื่อวัสดุ</label>
                                    <input id="material_name" type="text"
                                        class="form-control @error('material_name') is-invalid @enderror"
                                        name="material_name" required placeholder="ชื่อวัสดุ"
                                        value="{{ $mate['material_name'] }}" autocomplete="material_name">

                                    @error('material_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="material_number" class="form-label">จำนวนวัสดุ</label>
                                    <input id="material_number" type="number"
                                        class="form-control @error('material_number') is-invalid @enderror"
                                        name="material_number" value="{{ $mate['material_number'] }}" required
                                        placeholder="จำนวนวัสดุ" autocomplete="material_number">

                                    @error('material_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name_material_count" class="form-label">ชื่อเรียกจำนวนนับวัสดุ (เช่น อัน ตัว
                                        อื่น ๆ
                                        )</label>
                                    <input id="name_material_count" type="text"
                                        class="form-control @error('name_material_count') is-invalid @enderror"
                                        name="name_material_count" required placeholder="ชื่อเรียกจำนวนนับวัสดุ"
                                        value="{{ $mate['name_material_count'] }}" autocomplete="name_material_count">

                                    @error('name_material_count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="code_material_storage" class="form-label">ที่เก็บวัสดุ</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="code_material_storage" required>
                                        <option selected disabled>ที่เก็บวัสดุ</option>
                                        @foreach ($data as $lo)
                                            @if ($lo->code_storage == $mate['code_material_storage'])
                                                <option value="{{ $lo->code_storage }}" selected>{{ $lo->building_name }}
                                                    {{ $lo->floor }} {{ $lo->room_name }}</option>
                                            @else
                                                <option value="{{ $lo->code_storage }}">{{ $lo->building_name }}
                                                    {{ $lo->floor }} {{ $lo->room_name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
