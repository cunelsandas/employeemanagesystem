@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                    <h4 class="center grey-text text-darken-2 card-title">นำเข้ารายการรับจ่ายของ <label
                                style="text-decoration: underline;font-size: 1.4em">{{$employee->first_name}} {{$employee->last_name}}</label>
                    </h4>
                </div>
                <hr>

                <form action="{{route('payments.update',$employee->id)}}" method="POST">
                    <div class="card-content">
                        <div class="row">
{{--                            <div class="input-field col s12 m12 l12 xl12 offset-xl0">--}}
{{--                                <i class="material-icons prefix">calendar_today</i>--}}
{{--                                <select id="month_sso" name="month_sso" required="required" oninvalid="this.setCustomValidity('กรุณาเลือกเดือนเพื่อนำไปคำนวณประกันสังคม')"--}}
{{--                                        oninput="this.setCustomValidity('')">--}}
{{--                                    <option value="" selected>กรุณาเลือกเดือน</option>--}}
{{--                                    @foreach($sso_pay as $sso)--}}
{{--                                        @if($sso->sso_percent == 0)--}}
{{--                                            <option value="0"--}}
{{--                                                    data-foo="{{date('m')}}">{{$sso->month_name}}</option>--}}
{{--                                        @else--}}
{{--                                            <option value="{{$sso->sso_percent}}"--}}
{{--                                                    data-foo="{{$sso->sso_month}}">{{$sso->month_name}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <label for="month_sso">เดือน <b style="color: red">*กรณีไม่หักประกันสังคมให้เลือกไม่หักประกันสังคม ระบบจะนำข้อมูลที่บันทึกไปไว้ในเดือนที่ท่านบันทึก</b></label>--}}
{{--                            </div>--}}

                            <script>
                                $(function () {
                                    $('select').change(function () {
                                        var selected = $(this).find('option:selected');
                                        var extra = selected.data('foo');

                                        $('#month').val(extra);
                                    });
                                });
                            </script>
                            <div>
                                ประกันสังคม(เป็นตัวเลขเท่านั้น ไม่ต้องใส่%)<input type="text" id="monthoutput" style="text-align:center;">
                                เดือนที่(เป็นตัวเลขเท่านั้น)<input type="number" id="month" name="month" style="text-align:center;">
                                ปี ค.ศ.<input type="text" id="year" name="year" style="text-align:center;" readonly value="{{date('Y')}}">
                            </div>

                            <script>
                                var s = document.getElementById('month_sso').options[2].value;
                                document.getElementById('monthoutput').value = s;

                                // On Change Event for select option

                                $("select#month_sso").change(function () {
                                    // Two ways to get the current selected option

                                    // 1. Using JQUERY VAL
                                    var selected = $('#month_sso').val();

                                    // 2. Using option:selected
                                    var out = $('#month_sso option:selected');

                                    $('#monthoutput').val(selected);
                                });
                            </script>
                            {{--                        <div class="input-field col s12 m6 l6 xl2">--}}
                            {{--                            <i class="material-icons prefix">person</i>--}}
                            {{--                            <input class="center-align" type="text" name="month" id="month" readonly--}}
                            {{--                                   value="{{date('m')}}">--}}
                            {{--                            <label for="month">เดือน</label>--}}
                            {{--                            <span class="{{$errors->has('month') ? 'helper-text red-text' : ''}}">{{$errors->first('month')}}</span>--}}
                            {{--                        </div>--}}
                            <div style="display: none" class="input-field col s12 m6 l6 xl2">
                                <i class="material-icons prefix">person</i>
                                <input class="center-align" type="text" name="emp_id" id="emp_id" readonly
                                       value="{{old('emp_id') ? : $employee->id}}">
                                <label for="emp_id">ไอดี</label>
                                <span class="{{$errors->has('emp_id') ? 'helper-text red-text' : ''}}">{{$errors->first('emp_id')}}</span>
                            </div>
                            <div style="display: none" class="input-field col s12 m6 l6 xl4  offset-x12">
                                <i class="material-icons prefix">person</i>
                                <input class="center-align" type="text" name="first_name" id="first_name" readonly
                                       value="{{old('first_name') ? : $employee->first_name}}">
                                <label for="first_name">ชื่อ</label>
                                <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                            </div>
                            <div style="display: none" class="input-field col s12 m6 l6 xl4  offset-x12">
                                <i class="material-icons prefix">person</i>
                                <input class="center-align" type="text" name="last_name" id="last_name" readonly
                                       value="{{old('last_name') ? : $employee->last_name}}">
                                <label for="last_name">นามสกุล</label>
                                <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <label>รายการรับ</label>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix">attach_money</i>
                                <input class="center-align" type="number" min="0" step=".01" name="salary" id="salary"
                                       value="{{old('salary') ? : $employee->empSalary->s_amount}}">
                                <label for="salary">เงินเดือน (บาท)</label>
                                <span class="{{$errors->has('salary') ? 'helper-text red-text' : ''}}">{{$errors->first('salary')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0.00" step=".01" name="money_extra"
                                       id="money_extra" value="0">
                                <label for="money_extra">เงินเพิ่มค่าครองชีพ (บาท)</label>
                                <span class="{{$errors->has('money_extra') ? 'helper-text red-text' : ''}}">{{$errors->first('money_extra')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_extra_position"
                                       id="money_extra_position" value="0">
                                <label for="money_extra_position">เงินประจำตำแหน่ง (บาท)</label>
                                <span class="{{$errors->has('money_extra_position') ? 'helper-text red-text' : ''}}">{{$errors->first('money_extra_position')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_treatment_cost"
                                       id="money_treatment_cost" value="0">
                                <label for="money_treatment_cost">ค่ารักษาพยาบาล (บาท)</label>
                                <span class="{{$errors->has('money_treatment_cost') ? 'helper-text red-text' : ''}}">{{$errors->first('money_treatment_cost')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_rent_home"
                                       id="money_rent_home" value="0">
                                <label for="money_rent_home">ค่าเช่าบ้าน (บาท)</label>
                                <span class="{{$errors->has('money_rent_home') ? 'helper-text red-text' : ''}}">{{$errors->first('money_rent_home')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_recurring_salary"
                                       id="money_recurring_salary" value="0">
                                <label for="money_recurring_salary">ตกเบิกเงินเดือน (บาท)</label>
                                <span class="{{$errors->has('money_recurring_salary') ? 'helper-text red-text' : ''}}">{{$errors->first('money_recurring_salary')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_bonus"
                                       id="money_bonus" value="0">
                                <label for="money_bonus">โบนัส (บาท)</label>
                                <span class="{{$errors->has('money_bonus') ? 'helper-text red-text' : ''}}">{{$errors->first('money_bonus')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="money_child_edu"
                                       id="money_child_edu" value="0">
                                <label for="money_child_edu">ค่าช่วยเหลือการศึกษาบุตร (บาท)</label>
                                <span class="{{$errors->has('money_child_edu') ? 'helper-text red-text' : ''}}">{{$errors->first('money_child_edu')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">drag_handle</i>
                                <input class="center-align" readonly type="number" min="0" step=".01"
                                       name="salary_amount" id="salary_amount" value=""
                                       placeholder="">
                                <label for="salary_amount">รวมรับทั้งสื้น (บาท)</label>
                                <span class="{{$errors->has('salary_amount') ? 'helper-text red-text' : ''}}">{{$errors->first('salary_amount')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <label>รายการจ่าย</label>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="sso_pay" id="sso_pay"
                                       value="{{old('sso_pay')}}">
                                <label for="sso_pay">ค่าประกันสังคม (บาท)</label>
                                <span class="{{$errors->has('sso_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('sso_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="saving_group_pay"
                                       id="saving_group_pay" value="0">
                                <label for="saving_group_pay">กลุ่มออมทรัพย์พนักงาน (บาท)</label>
                                <span class="{{$errors->has('saving_group_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_group_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="saving_dcd_pay"
                                       id="saving_dcd_pay" value="0">
                                <label for="saving_dcd_pay">สหกรณ์ออมทรัพย์กรมการพัฒนาชุมชน (บาท)</label>
                                <span class="{{$errors->has('saving_dcd_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_dcd_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="saving_teacher_pay"
                                       id="saving_teacher_pay" value="0">
                                <label for="saving_teacher_pay">สหกรณ์ออมทรัพย์ครู (บาท)</label>
                                <span class="{{$errors->has('saving_teacher_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_teacher_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="saving_moe_pay"
                                       id="saving_moe_pay" value="0">
                                <label for="saving_moe_pay">สหกรณ์ออมทรัพย์ข้าราชการกระทรวงศึกษาธิการ (บาท)</label>
                                <span class="{{$errors->has('saving_moe_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_moe_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="loan_gsb_pay"
                                       id="loan_gsb_pay" value="0">
                                <label for="loan_gsb_pay">เงินกู้ธนาคารออมสิน (บาท)</label>
                                <span class="{{$errors->has('loan_gsb_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('loan_gsb_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="loan_baac_pay" id="loan_baac_pay"
                                       value="0">
                                <label for="loan_baac_pay">เงินกู้ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร (บาท)</label>
                                <span class="{{$errors->has('loan_baac_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('loan_baac_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="loan_ktb_pay" id="loan_ktb_pay"
                                       value="0">
                                <label for="loan_ktb_pay">เงินกู้ธนาคารกรุงไทย (บาท)</label>
                                <span class="{{$errors->has('loan_ktb_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('loan_ktb_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="loan_student_pay" id="loan_student_pay"
                                       value="0">
                                <label for="loan_student_pay">เงินกู้กยศ. (บาท)</label>
                                <span class="{{$errors->has('loan_student_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('loan_student_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="loan_ghb_pay" id="loan_ghb_pay"
                                       value="0">
                                <label for="loan_ghb_pay">เงินกู้ธนาคารอาคารสงเคราะห์ (บาท)</label>
                                <span class="{{$errors->has('loan_ghb_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('loan_ghb_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="saving_local_pay"
                                       id="saving_local_pay" value="0">
                                <label for="saving_local_pay">สหกรณ์ออมทรัพย์ข้าราชการส่วนท้องถิ่นจำกัด (บาท)</label>
                                <span class="{{$errors->has('saving_local_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_local_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" step=".01" name="tax_pay"
                                       id="tax_pay" value="0">
                                <label for="tax_pay">ภาษีหัก ณ ที่จ่าย (บาท)</label>
                                <span class="{{$errors->has('tax_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('tax_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">drag_handle</i>
                                <input class="center-align" readonly type="number" min="0" name="pay_amount"
                                       id="pay_amount" value="" placeholder="">
                                <label for="pay_amount">รวมจ่ายทั้งสิ้น (บาท)</label>
                                <span class="{{$errors->has('pay_amount') ? 'helper-text red-text' : ''}}">{{$errors->first('pay_amount')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <label>รับสุทธิ</label>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">account_balance_wallet</i>
                                <input class="center-align" readonly type="number" min="0" step=".01" name="net_receive"
                                       id="net_receive" value="{{old('net_receive')}}" placeholder="">
                                <label for="net_receive">รับสุทธิ (บาท)</label>
                                <span class="{{$errors->has('net_receive') ? 'helper-text red-text' : ''}}">{{$errors->first('net_receive')}}</span>
                            </div>
                        </div>
                    </div>
                    @method('PUT')
                    @csrf()
                    <div class="row">
                        <button type="submit"
                                class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">
                            อัพเดท
                        </button>
                    </div>
                </form>


                {{--                <div class="table-responsive">--}}
                {{--                    <form method="post" id="dynamic_form">--}}
                {{--                        <span id="result"></span>--}}
                {{--                        <table class="table table-bordered table-striped" id="user_table">--}}
                {{--                            <thead>--}}
                {{--                            <tr>--}}
                {{--                                <th width="5%">ไอดี</th>--}}
                {{--                                <th width="35%">ชื่อ</th>--}}
                {{--                                <th width="35%">จำนวนเงิน</th>--}}
                {{--                                <th width="30%">แก้ไข</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody>--}}

                {{--                            </tbody>--}}
                {{--                            <tfoot>--}}
                {{--                            <tr>--}}
                {{--                                <td colspan="2" align="right">&nbsp;</td>--}}
                {{--                                <td>--}}
                {{--                                    @csrf--}}
                {{--                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="บันทึก"/>--}}
                {{--                                </td>--}}
                {{--                            </tr>--}}
                {{--                            </tfoot>--}}
                {{--                        </table>--}}
                {{--                    </form>--}}
                {{--                </div>--}}

                <script>
                    $(document).ready(function () {

                        var count = 1;

                        dynamic_field(count);

                        function dynamic_field(number) {
                            html = '<tr>';
                            html += '<td><input type="text" name="emp_id[]" class="form-control" value="{{$employee->id}}" /></td>';
                            html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
                            html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
                            if (number > 1) {
                                html += '<td><button type="button" name="remove" id="" class="btn remove red col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2">ลบ</button></td></tr>';
                                $('tbody').append(html);
                            } else {
                                html += '<td><button type="button" name="add" id="add" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">เพิ่ม</button></td></tr>';
                                $('tbody').html(html);
                            }
                        }

                        $(document).on('click', '#add', function () {
                            count++;
                            dynamic_field(count);
                        });

                        $(document).on('click', '.remove', function () {
                            count--;
                            $(this).closest("tr").remove();
                        });

                        $('#dynamic_form').on('submit', function (event) {
                            event.preventDefault();
                            $.ajax({
                                url: '{{ route("dynamic-field.insert") }}',
                                method: 'post',
                                data: $(this).serialize(),
                                dataType: 'json',
                                beforeSend: function () {
                                    $('#save').attr('disabled', 'disabled');
                                },
                                success: function (data) {
                                    if (data.error) {
                                        var error_html = '';
                                        for (var count = 0; count < data.error.length; count++) {
                                            error_html += '<p>' + data.error[count] + '</p>';
                                        }
                                        $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                                    } else {
                                        dynamic_field(1);
                                        $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                                    }
                                    $('#save').attr('disabled', false);
                                }
                            })
                        });

                    });
                </script>

                <div class="card-action">
                    <a href="/payments">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var valsalary = parseFloat($('#salary').val());
                var valextra1 = parseFloat($('#money_extra').val());
                var valextra2 = parseFloat($('#money_extra_position').val());
                var valextra3 = parseFloat($('#money_treatment_cost').val());
                var valextra4 = parseFloat($('#money_rent_home').val());
                var valextra5 = parseFloat($('#money_recurring_salary').val());
                var valextra6 = parseFloat($('#money_bonus').val());
                var valextra7 = parseFloat($('#money_child_edu').val());
                var sum = Math.round(valsalary + valextra1 + valextra2 + valextra3 + valextra4 + valextra5 + valextra6 + valextra7);
                $("input#salary_amount").val(sum);
            });
        });

        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var pay1 = parseFloat($('#sso_pay').val());
                var pay2 = parseFloat($('#saving_group_pay').val());
                var pay3 = parseFloat($('#saving_dcd_pay').val());
                var pay4 = parseFloat($('#saving_teacher_pay').val());
                var pay5 = parseFloat($('#saving_moe_pay').val());
                var pay6 = parseFloat($('#loan_gsb_pay').val());
                var pay7 = parseFloat($('#loan_baac_pay').val());
                var pay8 = parseFloat($('#loan_ktb_pay').val());
                var pay9 = parseFloat($('#loan_student_pay').val());
                var pay10 = parseFloat($('#loan_ghb_pay').val());
                var pay11 = parseFloat($('#saving_local_pay').val());
                var pay12 = parseFloat($('#tax_pay').val());
                var sum = Math.round(pay1 + pay2 + pay3 + pay4 + pay5 + pay6 + pay7 + pay8 + pay9 + pay10 + pay11 + pay12);
                $("input#pay_amount").val(sum);
            });
        });

        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var salary_amount = parseFloat($('#salary_amount').val());
                var pay_amount = parseFloat($('#pay_amount').val());
                var sum = Math.round(salary_amount - pay_amount);
                $("input#net_receive").val(sum);
            });
        });

        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var salary = parseFloat($('#salary').val());
                var sso_percent = parseFloat($('#monthoutput').val());
                var sum = Math.round(salary * sso_percent / 100);
                if (sum > 750) {
                    sum = 750;
                }
                $("input#sso_pay").val(sum);
            });
        });
    </script>

@endsection