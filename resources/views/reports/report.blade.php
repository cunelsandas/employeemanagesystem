<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{public_path('css/materialize.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
        <title>รายงานการจ้างพนักงาน</title>
        <style>
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
            }
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: bold;
                src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
            }
            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: normal;
                src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
            }
            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: bold;
                src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
            }

            body {
                font-family: "THSarabunNew";
                font-size: 18px;
            }
            td{
                border-top:#9e9e9e 1px solid !important;
                border-bottom:#9e9e9e 1px solid !important;
                border-right:#e0e0e0 1px solid !important;
                border-left:#e0e0e0 1px solid !important;
            }
            th{
                border-bottom:#212121 1px solid !important;
                border-top:#212121 1px solid !important;
                border-right:#9e9e9e 1px solid !important;
                border-left:#9e9e9e 1px solid !important;
            }
        </style>
    </head>
    <body>
        <h4 class="grey-text text-darken-1 center">รายงานการจ้างพนักงาน</h4>
        <table>
            <thead class="grey-text text-darken-1">
                <tr>
                    <th width="2%">ลำดับ</th>
                    <th width="15%">ชื่อ</th>
{{--                    <th>Email</th>--}}
                    <th>โทรศัพท์</th>
{{--                    <th>Zip Code</th>--}}
{{--                    <th>Country</th>--}}
                    <th>เงินเดือน(บาท)</th>
{{--                    <th>City</th>--}}
{{--                    <th>Salary</th>--}}
                    <th>แผนก</th>
                    <th>ตำแหน่ง</th>
                    <th width="15%">วันเกิด</th>
                    <th>อายุ</th>
                    <th width="15%">ที่อยู่</th>
                    <th width="15%">วันเข้าทำงาน</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
{{--                        <td>{{$employee->email}}</td>--}}
                        <td>{{$employee->phone}}</td>
{{--                        <td>{{$employee->empCity->zip_code}}</td>--}}
{{--                        <td>{{$employee->empCountry->country_name}}</td>--}}
{{--                        <td>{{$employee->empState->state_name}}</td>--}}
{{--                        <td>{{$employee->empCity->city_name}}</td>--}}
                        <td>{{number_format($employee->empSalary->s_amount,2)}}</td>
                        <td>{{$employee->empDepartment->dept_name}}</td>
                        <td>{{$employee->empDivision->division_name}}</td>
                        <td>{{Thaidatefull($employee->birth_date)}}</td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{Thaidatefull($employee->join_date)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>