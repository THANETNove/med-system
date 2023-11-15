<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <p class="text-center">
                        <img src="{{ URL::asset('/assets/img/icons/unicons/loggo-rmutk.png') }}" alt
                            class="mx-auto w-px-100 h-auto rounded-circle" />
                    </p>
                    <div class="app-brand justify-content-center">

                        <div class="app-brand-link gap-2">
                            {{--   --}}
                            <span class="app-brand-text demo text-body fw-bolder">สมัครสามชิก</span>
                        </div>
                    </div>
                    <!-- /Logo -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required placeholder="Enter your email"
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    required autocomplete="new-password" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <h6 class="mb-2">ข้อมูลสมาชิก</h6>
                        <div class="mb-3">
                            <label for="prefix" class="form-label">คำนำหน้า</label>
                            <input type="text" class="form-control @error('prefix') is-invalid @enderror"
                                id="prefix" name="prefix" placeholder="คำนำหน้า" required />
                            @error('prefix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prefix" class="form-label">รหัสพนักงาน</label>
                            <input type="text" class="form-control @error('employee_id') is-invalid @enderror"
                                id="employee_id" name="employee_id" placeholder="รหัสพนักงาน" required />
                            @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" name="first_name" placeholder="ชื่อ" required />
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name" name="last_name" placeholder="นามสกุล" required />
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">เบอร์โทร</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number" placeholder="เบอร์โทร" required />
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        @include('layouts.address')
                        <button class="btn btn-primary d-grid w-100 mt-4">Sign up</button>
                    </form>

                    <p class="text-center mt-3">
                        <span>มีบัญชีอยู่แล้ว?</span>
                        <a href="{{ url('/') }}">
                            <span>ลงชื่อเข้าใช้</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>
