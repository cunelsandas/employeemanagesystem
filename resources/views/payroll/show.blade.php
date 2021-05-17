@extends('layouts.app')
@section('content')
    <style>
        @media print {
            @page {
                margin: 2.5cm;
                size: A4 landscape;
            }
        }
    </style>
    <div class="container">
        @php
            $emp_id = auth()->user()->emp_id;
            $admin_id = auth()->user()->type;
        @endphp
        @if($payment->emp_id == $emp_id || $admin_id == 1)
            <div class="card-panel grey-text text-darken-2 mt-20">
                <h4 class="grey-text text-darken-1 center">
                    สลิปเงินเดือนของ {{$payment->first_name}} {{$payment->last_name}}</h4>
                <div id='printarea'>
                    <div class="row">
                        <img src="{{ url('storage/logo.png') }}" alt="" title=""/>
                        <p>รายละเอียดการจ่ายเงินเดือนและค่าจ้างรายเดือน</p>
                        <p>ของ{{$info_data->org_name}}</p>
                        <p>รายรับ-รายจ่าย</p>
                        <p>ประจำเดือน @if($payment->month == 1)มกราคม
                            @elseif($payment->month == 2)กุมภาพันธ์
                            @elseif($payment->month == 3)มีนาคม
                            @elseif($payment->month == 4)เมษายน
                            @elseif($payment->month == 5)พฤษภาคม
                            @elseif($payment->month == 6)มิถุนายน
                            @elseif($payment->month == 7)กรกฎาคม
                            @elseif($payment->month == 8)สิงหาคม
                            @elseif($payment->month == 9)กันยายน
                            @elseif($payment->month == 10)ตุลาคม
                            @elseif($payment->month == 11)พฤศจิกายน
                            @elseif($payment->month == 12)ธันวาคม
                            @endif พ.ศ.{{$payment->year+543}}</p>

                        <p>ชื่อ-สกุล {{$payment->first_name}} {{$payment->last_name}}
                            <br>
                        <p style="text-decoration: underline">รายการรับ</p>
                        <p>เงินเดือน {{number_format($payment->salary,2)}} บาท</p>
                        @if($payment->money_extra !=0)
                        <p>เงินเพิ่มค่าครองชีพ {{number_format($payment->money_extra,2)}} บาท</p>
                        @endif
                        @if($payment->money_extra_position !=0)
                        <p>เงินประจำตำแหน่ง {{number_format($payment->money_extra_position,2)}} บาท</p>
                        @endif
                        @if($payment->money_treatment_cost !=0)
                        <p>ค่ารักษาพยาบาล {{number_format($payment->money_treatment_cost,2)}} บาท</p>
                        @endif
                        @if($payment->money_rent_home !=0)
                        <p>ค่าเช่าบ้าน {{number_format($payment->money_rent_home,2)}} บาท</p>
                        @endif
                        @if($payment->money_recurring_salary !=0)
                        <p>ตกเบิกเงินเดือน {{number_format($payment->money_recurring_salary,2)}} บาท</p>
                        @endif
                        @if($payment->money_bonus !=0)
                        <p>โบนัส {{number_format($payment->money_bonus,2)}} บาท</p>
                        @endif
                        @if($payment->money_child_edu !=0)
                        <p>ค่าช่วยเหลือการศึกษาบุตร {{number_format($payment->money_child_edu,2)}} บาท</p>
                        @endif
                        <p><b>รวมรับทั้งสิ้น {{number_format($payment->salary_amount,2)}} บาท</b></p>
                        <br>
                        <p style="text-decoration: underline">รายการจ่าย</p>
                        @if($payment->saving_group_pay !=0)
                        <p>ประกันสังคม {{number_format($payment->sso_pay,2)}} บาท</p>
                        @endif
                        @if($payment->saving_group_pay !=0)
                        <p>กลุ่มออมทรัพย์พนักงาน {{number_format($payment->saving_group_pay,2)}} บาท</p>
                        @endif
                        @if($payment->saving_dcd_pay !=0)
                        <p>สหกรณ์ออมทรัพย์กรมการพัฒนาชุมชน {{number_format($payment->saving_dcd_pay,2)}} บาท</p>
                        @endif
                        @if($payment->saving_teacher_pay !=0)
                        <p>สหกรณ์ออมทรัพย์ครู {{number_format($payment->saving_teacher_pay,2)}} บาท</p>
                        @endif
                        @if($payment->saving_moe_pay !=0)
                        <p>สหกรณ์ออมทรัพย์ข้าราชการกระทรวงศึกษาธิการ {{number_format($payment->saving_moe_pay,2)}} บาท</p>
                        @endif
                        @if($payment->loan_gsb_pay !=0)
                        <p>เงินกู้ธนาคารออมสิน {{number_format($payment->loan_gsb_pay,2)}} บาท</p>
                        @endif
                        @if($payment->loan_baac_pay !=0)
                        <p>เงินกู้ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร {{number_format($payment->loan_baac_pay,2)}} บาท</p>
                        @endif
                        @if($payment->loan_ktb_pay !=0)
                        <p>เงินกู้ธนาคารกรุงไทย {{number_format($payment->loan_ktb_pay,2)}} บาท</p>
                        @endif
                        @if($payment->loan_student_pay !=0)
                        <p>เงินกู้กยศ. {{number_format($payment->loan_student_pay,2)}} บาท</p>
                        @endif
                        @if($payment->loan_ghb_pay !=0)
                        <p>เงินกู้ธนาคารอาคารสงเคราะห์ {{number_format($payment->loan_ghb_pay,2)}} บาท</p>
                        @endif
                        @if($payment->saving_local_pay !=0)
                            <p>สหกรณ์ออมทรัพย์ข้าราชการส่วนท้องถิ่นจำกัด {{number_format($payment->saving_local_pay,2)}} บาท</p>
                        @endif
                        @if($payment->tax_pay !=0)
                            <p>ภาษีหัก ณ ที่จ่าย {{number_format($payment->tax_pay,2)}} บาท</p>
                        @endif

                        <p><b>รวมจ่ายทั้งสิ้น {{number_format($payment->pay_amount,2)}} บาท</b></p>
                        <p><b>รับสุทธิ {{number_format($payment->net_receive,2)}} บาท</b></p>
                        ({{baht_text($payment->net_receive)}})
                        <br>
                        <img width="200px" src="{{ url('storage/signature.png') }}" alt="" title=""/>
                        <p>{{$info_data->header_name}}</p>
                        <p>(ผู้อำนวยการกองคลัง)</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <form target="_blank" action="{{route('payrolls.makeReportPayroll',$payment->id)}}" method="POST">
                        @csrf()
                        <button type="submit" class="btn col s6 offset-s3 m3 l3 xl3 offset-xl1">PRINT PDF</button>
                    </form>
                </div>
                {{--            <button class="btn red col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" onclick="print()">Print</button>--}}
                <script>
                    function print() {
                        var divToPrint = document.getElementById('printarea');
                        var htmlToPrint = '' +
                            '<style type="text/css">' +
                            '* {' +
                            'font-size: 12px;' +
                            '}' +
                            '</style>';
                        htmlToPrint += divToPrint.outerHTML;
                        newWin = window.open("");
                        newWin.document.write(htmlToPrint);
                        newWin.print();
                        newWin.close();
                    }
                </script>
            </div>
            @else
            <div class="card-panel grey-text text-darken-2 mt-20">
                <p style="color: red;font-size: 2em;text-decoration: underline">Permission Denined!</p>
                <p>ขออภัย ท่านไม่มีสิทธิ์ในการเข้าถึงข้อมูลบุคคลอื่น</p>
            </div>
        @endif
    </div>
@endsection