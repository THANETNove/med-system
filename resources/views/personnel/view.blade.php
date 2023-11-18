<div class="card-body">
    <h1 class="card-title text-primary ">ข้อมูลบุคลากร</h1>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">รหัสพนักงาน</label>
            <input class="form-control" type="text" id="employee_id" name="employee_id"
                value="{{ $data['employee_id'] }}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">คำนำหน้า</label>
            <input class="form-control" type="text" id="prefix" name="prefix" value="{{ $data['prefix'] }}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">ชื่อ</label>
            <input class="form-control" type="text" id="firstName" name="first_name"
                value="{{ $data['first_name'] }}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="lastName" class="form-label">นามสกุล</label>
            <input class="form-control" type="text" name="last_name" value="{{ $data['last_name'] }}" id="last_name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ $data['email'] }}" />
        </div>
        <div class="mb-3 col-md-6">
            <label for="phone_number" class="form-label">เบอร์โทร</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number"
                value="{{ $data['phone_number'] }}">
        </div>

        @php
            $dataProvinces = DB::table('provinces')->get();
            $dataDistricts = DB::table('districts')->get();
            $dataSubdistrict = DB::table('subdistricts')->get();
        @endphp

        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">ที่อยู่</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                name="address" placeholder="ที่อยู่" required />
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">จังหวัด</label>
            <select class="select-address select-address form-select font-size-12-black" name="provinces" id="provinces"
                aria-label="Default select example">
                <option selected disabled>จังหวัด</option>
                @foreach ($dataProvinces as $provinces)
                    @if ($data['provinces'] == $provinces->id)
                        <option value="{{ $provinces->id }}" selected>{{ $provinces->name_th }}</option>
                    @else
                        @if (Auth::user()->status == '2')
                            <option value="{{ $provinces->id }}">{{ $provinces->name_th }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">แขวง/ อำเภอ</label>
            <select class="select-address form-select mt-2 font-size-12-black" name="districts" id="districts"
                aria-label="Default select example">
                <option selected disabled>แขวง/ อำเภอ</option>
                @foreach ($dataSubdistrict as $subdistrict)
                    @if ($data['subdistrict'] == $subdistrict->id)
                        <option value="{{ $subdistrict->id }}" selected>{{ $subdistrict->name_th }}</option>
                    @else
                        @if (Auth::user()->status == '2')
                            <option value="{{ $subdistrict->id }}">{{ $subdistrict->name_th }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">เขต/ ตำบล</label>
            <select class="select-address form-select mt-2 font-size-12-black" name="subdistrict" id="subdistrict"
                aria-label="Default select example">
                <option selected disabled>เขต/ ตำบล</option>
                @foreach ($dataDistricts as $districts)
                    @if ($data['districts'] == $districts->id)
                        <option value="{{ $districts->id }}" selected>{{ $districts->name_th }}</option>
                    @else
                        @if (Auth::user()->status == '2')
                            <option value="{{ $districts->id }}">{{ $districts->name_th }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">รหัสไปรษณีย์</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $data['zip_code'] }}"
                placeholder="รหัสไปรษณีย์" />
        </div>
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">สถานะ
            </label>
            <select class="select-address form-select mt-2 font-size-12-black" name="status" id="status"
                aria-label="Default select example">
                <option selected disabled>สถานะ</option>
                @if ($data['status'] == '0')
                    <option value="{{ $data['statusEmployee'] }}" selected>ผู้เบิก</option>
                    @if ($data['statusEmployee'] == 'on')
                        <option value="1">เจ้าหน้าที่วัสดุ</option>
                        <option value="2">หัวหน้าวัสดุ</option>
                    @endif
                @elseif ($data['status'] == '1')
                    @if ($data['statusEmployee'] == 'on')
                        <option value="0">ผู้เบิก</option>
                    @endif
                    <option value="{{ $data['statusEmployee'] }}"selected>เจ้าหน้าที่วัสดุ</option>
                    @if ($data['statusEmployee'] == 'on')
                        <option value="2">หัวหน้าวัสดุ</option>
                    @endif
                @else
                    @if ($data['statusEmployee'] == 'on')
                        <option value="0">ผู้เบิก</option>
                        <option value="1">เจ้าหน้าที่วัสดุ</option>
                    @endif
                    <option value="{{ $data['statusEmployee'] }}" selected>หัวหน้าวัสดุ</option>

                @endif
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label">สถานะพนักงาน</label>
            <select class="select-address form-select mt-2 font-size-12-black" name="statusEmployee"
                id="statusEmployee" aria-label="Default select example">
                <option selected disabled>สถานะพนักงาน</option>
                @if ($data['statusEmployee'] == 'on')
                    <option value="{{ $data['statusEmployee'] }}" selected>พนักงาน</option>
                    @if ($data['statusEmployee'] == 'on')
                        <option value="off">พ้นสภาพพนักงาน</option>
                    @endif
                @else
                    <option value="{{ $data['statusEmployee'] }}" selected>พ้นสภาพพนักงาน</option>
                    @if ($data['statusEmployee'] == 'on')
                        <option value="on">พนักงาน</option>
                    @endif
                @endif
            </select>

        </div>
    </div>
</div>
