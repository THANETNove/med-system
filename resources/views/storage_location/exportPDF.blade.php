<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายงานข้อมูลสถานที่</title>
    <meta http-equiv="Content-Language" content="th" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap 3.x only : DOMPDF support float, not flexbox -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- thai font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai+Looped:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
            font-family: 'Noto Sans Thai Looped', sans-serif;
            font-family: 'Sarabun', sans-serif;
        }

        .mt--16 {
            margin-top: -16px
        }
    </style>
</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            @php
                                $i = 1;
                                $j = 1;
                                $countOn = $data->where('status', 'on')->count();
                                $countOff = $data->where('status', 'off')->count();

                            @endphp
                            <div class="card-body">
                                <h1 class="card-title text-primary ">สถานที่จัดเก็บ</h1>
                                <p>รายงานข้อมูลสถานที่จัดเก็บ</p>
                                <p class="mt--16">จำนวนสถานะที่เปิดใช้งาน {{ $countOn }}</p>
                                <p class="mt--16">จำนวนสถานะที่ปิดใช้งาน {{ $countOff }}</p>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่ออาคาร</th>
                                                <th>ชั้น</th>
                                                <th>ชื่อห้อง</th>
                                                <th>สถานะ</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            {{--  <h3>เปิดใช้งาน</h3> --}}
                                            @foreach ($data->where('status', 'on')->sortByDesc('created_at') as $da)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $da->building_name }}</td>
                                                    <td>{{ $da->floor }}</td>
                                                    <td>{{ $da->room_name }}</td>
                                                    <td>เปิดใช้งานอยู่</td>

                                                </tr>
                                            @endforeach
                                            <br>
                                            {{--  <h3>ปิดใช้งาน</h3> --}}
                                            @foreach ($data->where('status', 'off')->sortByDesc('created_at') as $da)
                                                <tr>
                                                    <th scope="row">{{ $j++ }}</th>
                                                    <td>{{ $da->building_name }}</td>
                                                    <td>{{ $da->floor }}</td>
                                                    <td>{{ $da->room_name }}</td>
                                                    <td>ปิดใช้งานอยู่</td>



                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
