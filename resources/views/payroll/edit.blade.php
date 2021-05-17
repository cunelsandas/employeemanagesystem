@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                    <h4 class="center grey-text text-darken-2 card-title">นำเข้ารายการรับจ่ายของ <label
                                style="text-decoration: underline;font-size: 1.4em">{{$employee->first_name}} {{$employee->last_name}}</label>
                        เดือน <label
                                style="text-decoration: underline;font-size:1.4em;">{{Thaimonthonly(date('M'))}}</label>
                    </h4>
                </div>
                <hr>
                <form action="{{route('payments.update',$employee->id)}}" method="POST">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s12 m6 l6 xl2">
                            <i class="material-icons prefix">person</i>
                            <input class="center-align" type="text" name="month" id="month" readonly
                                   value="{{date('m')}}">
                            <label for="month">ไอดี</label>
                            <span class="{{$errors->has('month') ? 'helper-text red-text' : ''}}">{{$errors->first('month')}}</span>
                        </div>
                        <div class="input-field col s12 m6 l6 xl2">
                            <i class="material-icons prefix">person</i>
                            <input class="center-align" type="text" name="emp_id" id="emp_id" readonly
                                   value="{{old('emp_id') ? : $employee->id}}">
                            <label for="emp_id">ไอดี</label>
                            <span class="{{$errors->has('emp_id') ? 'helper-text red-text' : ''}}">{{$errors->first('emp_id')}}</span>
                        </div>
                        <div class="input-field col s12 m6 l6 xl4">
                            <i class="material-icons prefix">person</i>
                            <input class="center-align" type="text" name="first_name" id="first_name" readonly
                                   value="{{old('first_name') ? : $employee->first_name}}">
                            <label for="first_name">ชื่อ</label>
                            <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                        </div>
                        <div class="input-field col s12 m6 l6 xl4">
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
                                <input class="center-align" type="number" min="0" name="salary" id="salary"
                                       data-type="currency"
                                       value="{{old('salary') ? : $employee->empSalary->s_amount}}">
                                <label for="salary">เงินเดือน (บาท)</label>
                                <span class="{{$errors->has('salary') ? 'helper-text red-text' : ''}}">{{$errors->first('salary')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0"  name="money_extra"
                                       id="money_extra" value="{{old('money_extra')}}">
                                <label for="money_extra">เงินเพิ่มค่าครองชีพ (บาท)</label>
                                <span class="{{$errors->has('money_extra') ? 'helper-text red-text' : ''}}">{{$errors->first('money_extra')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">drag_handle</i>
                                <input class="center-align" readonly type="number" min="0"
                                       name="salary_amount" id="salary_amount"  value="{{old('salary_amount')}}" placeholder="">
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
                                <input class="center-align" type="number" min="0"  name="sso_pay" id="sso_pay"
                                       value="{{old('sso_pay')}}">
                                <label for="sso_pay">ค่าประกันสังคม (บาท)</label>
                                <span class="{{$errors->has('sso_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('sso_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" name="saving_group_pay"
                                       id="saving_group_pay" value="{{old('saving_group_pay')}}">
                                <label for="saving_group_pay">กลุ่มออมทรัพย์พนักงาน (บาท)</label>
                                <span class="{{$errors->has('saving_group_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_group_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" name="saving_co_pay"
                                       id="saving_co_pay" value="{{old('saving_co_pay')}}">
                                <label for="saving_co_pay">สหกรณ์ออมทรัพย์พนักงาน (บาท)</label>
                                <span class="{{$errors->has('saving_co_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('saving_co_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <i class="material-icons prefix"></i>
                                <input class="center-align" type="number" min="0" name="tax_pay" id="tax_pay"
                                       value="{{old('tax_pay')}}">
                                <label for="tax_pay">ภาษีหัก ณ ที่จ่าย (บาท)</label>
                                <span class="{{$errors->has('tax_pay') ? 'helper-text red-text' : ''}}">{{$errors->first('tax_pay')}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">drag_handle</i>
                                <input class="center-align" readonly type="number" min="0" name="pay_amount"
                                       id="pay_amount" value="{{old('pay_amount')}}" placeholder="">
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
                                <input class="center-align" readonly type="number" min="0" name="net_receive"
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


                <div class="table-responsive">
                    <form method="post" id="dynamic_form">
                        <span id="result"></span>
                        <table class="table table-bordered table-striped" id="user_table">
                            <thead>
                            <tr>
                                <th width="5%">ไอดี</th>
                                <th width="35%">ชื่อ</th>
                                <th width="35%">จำนวนเงิน</th>
                                <th width="30%">แก้ไข</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td>
                                    @csrf
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="บันทึก"/>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>

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
                var valextra = parseFloat($('#money_extra').val());
                var sum = Math.round(valsalary + valextra);
                $("input#salary_amount").val(sum);
            });
        });

        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var sso_pay = parseFloat($('#sso_pay').val());
                var saving_group_pay = parseFloat($('#saving_group_pay').val());
                var saving_co_pay = parseFloat($('#saving_co_pay').val());
                var tax_pay = parseFloat($('#tax_pay').val());
                var sum = Math.round(sso_pay + saving_group_pay + saving_co_pay + tax_pay);
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
    </script>

    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function () {
                formatCurrency($(this));
            },
            blur: function () {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }


    </script>
@endsection