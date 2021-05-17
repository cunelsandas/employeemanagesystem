<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/materialize.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>รายการเงินเดือน</title>
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

        td {
            border-top: #9e9e9e 1px solid !important;
            border-bottom: #9e9e9e 1px solid !important;
            border-right: #e0e0e0 1px solid !important;
            border-left: #e0e0e0 1px solid !important;
        }

        th {
            border-bottom: #212121 1px solid !important;
            border-top: #212121 1px solid !important;
            border-right: #9e9e9e 1px solid !important;
            border-left: #9e9e9e 1px solid !important;
        }

        label {
            font-size: 16px;
            color: black;
            display: inline-block;
            line-height: 5px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
@php $i=0; @endphp
<div class="row">
    @foreach($payment as $pm)
        @php $i++ @endphp
        <div class="col" style="width:40%;padding: 10px;border: dashed 1px black;table-layout: fixed;margin-left: 20px;margin-right: 20px">
            <img src="{{ url('storage/logo.png') }}" alt="" title=""/><br>
            <label style="margin-left: 45px;">รายละเอียดการจ่ายเงินเดือนและค่าจ้างรายเดือน</label><br>
            <label style="margin-left: 65px;">ขององค์การบริหารส่วนตำบลสันกลาง</label><br>
            <label style="margin-left: 105px;">รายรับ-รายจ่าย</label><br>
            <label style="margin-left: 75px;"><b>ประจำเดือน
                    @if($pm->month==1) มกราคม
                    @elseif($pm->month==2)กุมภาพันธ์
                    @elseif($pm->month==3)มีนาคม
                    @elseif($pm->month==4)เมษายน
                    @elseif($pm->month==5)พฤษภาคม
                    @elseif($pm->month==6)มิถุนายน
                    @elseif($pm->month==7)กรกฎาคม
                    @elseif($pm->month==8)สิงหาคม
                    @elseif($pm->month==9)กันยายน
                    @elseif($pm->month==10)ตุลาคม
                    @elseif($pm->month==11)พฤศจิกายน
                    @elseif($pm->month==12)ธันวาคม
                    @endif
                    พ.ศ.{{Thaiyearonly($pm->year)}}</b></label><br>

            <label><font
                        style="text-decoration: underline">ชื่อ-สกุล</font> {{$pm->first_name}} {{$pm->last_name}}
            </label>
            <br>
            <label style="text-decoration: underline"><b>รายการรับ</b></label><br>
            <label>เงินเดือน {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->salary,2)}}
                บาท</label><br>
            <label>เงินเพิ่มค่าครองชีพ {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->money_extra,2)}}
                บาท</label><br>
            <label style="margin-left: 30px;"><b>รวมรับทั้งสิ้น {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->salary_amount,2)}}
                    บาท</b></label>
            <br>
            <label style="text-decoration: underline"><b>รายการจ่าย</b></label><br>
            <label>ประกันสังคม {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->sso_pay,2)}}
                บาท</label><br>
            <label>กลุ่มออมทรัพย์พนักงาน {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->saving_group_pay,2)}}
                บาท</label><br>
            <label>สหกรณ์ออมทรัพย์พนักงาน {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->saving_co_pay,2)}}
                บาท</label><br>
            <label>ภาษีหัก ณ
                ที่จ่าย {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->tax_pay,2)}}
                บาท</label><br>
            <label style="margin-left: 30px;"><b>รวมจ่ายทั้งสิ้น {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->pay_amount,2)}}
                    บาท</b></label><br>
            <label style="margin-left: 30px;"><b>รับสุทธิ {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!}{{number_format($pm->net_receive,2)}}
                    บาท</b></label><br>
            <label style="margin-left: 30px;">({{baht_text($pm->net_receive)}})</label>
            <br>
            <img width="200px" src="{{ url('storage/signature.png') }}" alt="" title=""/><br>
            <label style="margin-left: 40px;">นายทดสอบ ทดสอบ</label><br>
            <label style="margin-left: 40px;">(ผู้อำนวยการกองคลัง)</label>
        </div>
        @if( $i % 2 == 0 )
        <div class="page-break"></div>
        @endif
    @endforeach
</div>

</body>
</html>