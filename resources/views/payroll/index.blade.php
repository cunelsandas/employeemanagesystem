@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="grey-text text-darken-1 center">สลิปเงินเดือน</h4>
        {{-- Search --}}
        @if($userzone = auth()->user()->type == 1)
            <div class="row mb-0">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">search</i>
                            ค้นหาพนักงาน
                        </div>
                        <div class="collapsible-body">
                            <div class="row mb-0">
                                <form action="{{route('employees.search')}}" method="POST">
                                    @csrf()
                                    <div class="input-field col s12 m6 l5 xl6">
                                        <input id="search" type="text" name="search">
                                        <label for="search">ค้นหา</label>
                                        <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                                    </div>
                                    <div class="input-field col s12 m6 l4 xl4">
                                        <select name="options" id="options">
                                            <option value="first_name">ชื่อ</option>
                                            <option value="last_name">นามสกุล</option>
                                            <option value="email">อีเมล</option>
                                            <option value="address">ที่อยู่</option>
                                        </select>
                                        <label for="options">Search by:</label>
                                    </div>
                                    <br>
                                    <div class="col l2">
                                        <button type="submit" class="btn waves-effect waves-light">ค้นหา</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- Search END --}}
        <!-- Show All Employee List as a Card -->

            {{--        <div class="row mb-0">--}}
            {{--            <form target="_blank" action="{{route('payrolls.makeReportPayrollAll')}}" method="POST">--}}
            {{--                @csrf()--}}
            {{--                <button type="submit" class="btn col s6 offset-s3 m3 l3 xl3 offset-xl1">พิมพ์รายงานเงินเดือนทั้งหมด--}}
            {{--                </button>--}}
            {{--            </form>--}}
            {{--        </div>--}}


            <h5>พิมพ์สลิปรายเดือน</h5>
            <div class="row mb-0">
                <form action="{{route('payrolls.makeReportPayrollAll')}}" target="_blank" method="POST">
                    @csrf()
                    <div class="input-field col s10 offset-s1 m4 l4 xl3 offset-xl1">
                        <i class="material-icons prefix">date_range</i>
                        <select name="monthselect" id="monthselect">
                            <option value="">กรุณาเลือกเดือน</option>
                            <option value="1">มกราคม</option>
                            <option value="2">กุมภาพันธ์</option>
                            <option value="3">มีนาคม</option>
                            <option value="4">เมษายน</option>
                            <option value="5">พฤษภาคม</option>
                            <option value="6">มิถุนายน</option>
                            <option value="7">กรกฎาคม</option>
                            <option value="8">สิงหาคม</option>
                            <option value="9">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>
                    </div>
                    <div class="input-field col s10 offset-s1 m4 l4 xl3">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" name="yearinput" id="yearinput" placeholder="ใส่ปี คศ">
                        <label for="yearinput">ใส่ปี ค.ศ.</label>
                    </div>
                    <br>
                    <button type="submit" class="btn col s6 offset-s3 m3 l3 xl4 offset-xl1">สร้าง PDF</button>
                </form>
            </div>

            <h5>ส่งสลิปไปที่อีเมล</h5>
            <div class="row mb-0">
                    <form action="{{route('payrolls.SendEmailSlip')}}" target="_blank" method="POST">
                        @csrf()
                        <div class="input-field col s10 offset-s1 m4 l4 xl3 offset-xl1">
                            <i class="material-icons prefix">date_range</i>
                            <select name="monthselectformail" id="monthselectformail">
                                <option value="">กรุณาเลือกเดือน</option>
                                <option value="1">มกราคม</option>
                                <option value="2">กุมภาพันธ์</option>
                                <option value="3">มีนาคม</option>
                                <option value="4">เมษายน</option>
                                <option value="5">พฤษภาคม</option>
                                <option value="6">มิถุนายน</option>
                                <option value="7">กรกฎาคม</option>
                                <option value="8">สิงหาคม</option>
                                <option value="9">กันยายน</option>
                                <option value="10">ตุลาคม</option>
                                <option value="11">พฤศจิกายน</option>
                                <option value="12">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="input-field col s10 offset-s1 m4 l4 xl3">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" name="yearinputformail" id="yearinputformail" placeholder="ใส่ปี คศ">
                            <label for="yearinputformail">ใส่ปี ค.ศ.</label>
                        </div>
                        <br>
                        <button type="submit" class="btn col s6 offset-s3 m3 l3 xl4 offset-xl1">
                            ส่งสลิปเงินเดือนไปที่อีเมล
                        </button>
                    </form>
                </div>


                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน มกราคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls1->count())
                                    @php $i1 = 1; @endphp
                                    @foreach($payrolls1 as $payroll1)
                                        <tr>
                                            <td>{{$i1++}}</td>
                                            <td>{{$payroll1->first_name}} {{$payroll1->last_name}}</td>
                                            <td>
                                                มกราคม {{$payroll1->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll1->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll1->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll1->first_name}} {{$payroll1->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls1->links('vendor.pagination.default',['paginator' => $payrolls1])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน กุมภาพันธ์</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls2->count())
                                    @php $i2 = 1; @endphp
                                    @foreach($payrolls2 as $payroll2)
                                        <tr>
                                            <td>{{$i2++}}</td>
                                            <td>{{$payroll2->first_name}} {{$payroll2->last_name}}</td>
                                            <td>
                                                กุมภาพันธ์ {{$payroll2->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll2->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll2->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll2->first_name}} {{$payroll2->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls2->links('vendor.pagination.default',['paginator' => $payrolls2])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน มีนาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls3->count())
                                    @php $i3 = 1; @endphp
                                    @foreach($payrolls3 as $payroll3)
                                        <tr>
                                            <td>{{$i3++}}</td>
                                            <td>{{$payroll3->first_name}} {{$payroll3->last_name}}</td>
                                            <td>
                                                มีนาคม {{$payroll3->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll3->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll3->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll3->first_name}} {{$payroll3->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls3->links('vendor.pagination.default',['paginator' => $payrolls3])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน เมษายน</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls4->count())
                                    @php $i4 = 1; @endphp
                                    @foreach($payrolls4 as $payroll4)
                                        <tr>
                                            <td>{{$i4++}}</td>
                                            <td>{{$payroll4->first_name}} {{$payroll4->last_name}}</td>
                                            <td>
                                                เมษายน {{$payroll4->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll4->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll4->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll4->first_name}} {{$payroll4->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls4->links('vendor.pagination.default',['paginator' => $payrolls4])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน พฤษภาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls5->count())
                                    @php $i5 = 1; @endphp
                                    @foreach($payrolls5 as $payroll5)
                                        <tr>
                                            <td>{{$i5++}}</td>
                                            <td>{{$payroll5->first_name}} {{$payroll5->last_name}}</td>
                                            <td>
                                                พฤษภาคม {{$payroll5->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll5->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll5->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll5->first_name}} {{$payroll5->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls5->links('vendor.pagination.default',['paginator' => $payrolls5])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน มิถุนายน</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls6->count())
                                    @php $i6 = 1; @endphp
                                    @foreach($payrolls6 as $payroll6)
                                        <tr>
                                            <td>{{$i6++}}</td>
                                            <td>{{$payroll6->first_name}} {{$payroll5->last_name}}</td>
                                            <td>
                                                มิถุนายน {{$payroll6->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll6->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll6->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll6->first_name}} {{$payroll6->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls6->links('vendor.pagination.default',['paginator' => $payrolls6])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน กรกฏาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls7->count())
                                    @php $i7 = 1; @endphp
                                    @foreach($payrolls7 as $payroll7)
                                        <tr>
                                            <td>{{$i7++}}</td>
                                            <td>{{$payroll7->first_name}} {{$payroll7->last_name}}</td>
                                            <td>
                                                กรกฎาคม {{$payroll7->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll7->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll7->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll7->first_name}} {{$payroll7->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls7->links('vendor.pagination.default',['paginator' => $payrolls7])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน สิงหาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls8->count())
                                    @php $i8 = 1; @endphp
                                    @foreach($payrolls8 as $payroll8)
                                        <tr>
                                            <td>{{$i8++}}</td>
                                            <td>{{$payroll8->first_name}} {{$payroll8->last_name}}</td>
                                            <td>
                                                สิงหาคม {{$payroll8->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll8->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll8->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll8->first_name}} {{$payroll8->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls8->links('vendor.pagination.default',['paginator' => $payrolls8])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน กันยายน</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls9->count())
                                    @php $i9 = 1; @endphp
                                    @foreach($payrolls9 as $payroll9)
                                        <tr>
                                            <td>{{$i9++}}</td>
                                            <td>{{$payroll9->first_name}} {{$payroll9->last_name}}</td>
                                            <td>
                                                กันยายน {{$payroll9->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll9->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll9->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll9->first_name}} {{$payroll9->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls9->links('vendor.pagination.default',['paginator' => $payrolls9])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน ตุลาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls10->count())
                                    @php $i10 = 1; @endphp
                                    @foreach($payrolls10 as $payroll10)
                                        <tr>
                                            <td>{{$i10++}}</td>
                                            <td>{{$payroll10->first_name}} {{$payroll10->last_name}}</td>
                                            <td>
                                                ตุลาคม {{$payroll10->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll10->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll10->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll10->first_name}} {{$payroll10->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls10->links('vendor.pagination.default',['paginator' => $payrolls10])}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน พฤศจิกายน</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls11->count())
                                    @php $i11 = 1; @endphp
                                    @foreach($payrolls1 as $payroll11)
                                        <tr>
                                            <td>{{$i11++}}</td>
                                            <td>{{$payroll11->first_name}} {{$payroll11->last_name}}</td>
                                            <td>
                                                พฤศจิกายน {{$payroll11->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll11->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll11->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll11->first_name}} {{$payroll11->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls11->links('vendor.pagination.default',['paginator' => $payrolls11])}}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน ธันวาคม</h5>
                            <!-- Table that shows Employee List -->
                            <table class="responsive-table col s12 m12 l12 xl12">
                                <thead class="grey-text text-darken-1">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ประจำเดือน</th>
                                    {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                    <th>ดู/ลบข้อมูล</th>
                                    {{--                            <th>ลบ</th>--}}
                                </tr>
                                </thead>
                                <tbody id="emp-table">
                                <!-- Check if there are any employee to render in view -->
                                @if($payrolls12->count())
                                    @php $i12 = 1; @endphp
                                    @foreach($payrolls12 as $payroll12)
                                        <tr>
                                            <td>{{$i12++}}</td>
                                            <td>{{$payroll12->first_name}} {{$payroll12->last_name}}</td>
                                            <td>
                                                ธันวาคม {{$payroll12->year+543}}
                                            </td>
                                            {{--                                    <td>--}}
                                            {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                            {{--                                            @method('DELETE')--}}
                                            {{--                                            @csrf()--}}
                                            {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                            {{--                                        </form>--}}

                                            {{--                                    </td>--}}
                                            <td>
                                                <div class="row mb-0">
                                                    <div class="col">
                                                        <a href="{{route('payrolls.show',Crypt::encrypt($payroll12->id))}}"
                                                           class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                    class="material-icons">receipt_long</i></a>
                                                    </div>
                                                    <div class="col">
                                                        <form action="{{route('payrolls.destroy',$payroll12->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <button type="submit"
                                                                    class="btn btn-floating btn-small waves=effect waves-light red"
                                                                    onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payroll12->first_name}} {{$payroll12->last_name}} หรือไม่?')">
                                                                <i class="material-icons">delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(isset($search))
                                        <tr>
                                            <td colspan="4">
                                                <a href="/payments" class="right">Show All</a>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- if there are no employees then show this message --}}
                                    <tr>
                                        <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!-- employees Table END -->
                        </div>
                        <!-- Show Pagination Links -->
                        <div class="center">
                            {{$payrolls12->links('vendor.pagination.default',['paginator' => $payrolls12])}}
                        </div>
                    </div>
                </div>


                @elseif($userzone = auth()->user()->type == 99)

                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <h5 class="pl-15 grey-text text-darken-2">สลิปเงินเดือน</h5>
                                <!-- Table that shows Employee List -->
                                <table class="responsive-table col s12 m12 l12 xl12">
                                    <thead class="grey-text text-darken-1">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ประจำเดือน</th>
                                        {{--                            <th>วันที่เข้าทำงาน</th>--}}
                                        <th>ดู</th>
                                        {{--                            <th>ลบ</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody id="emp-table">
                                    <!-- Check if there are any employee to render in view -->
                                    @if($payrollsid->count())
                                        @php $idl = 1; @endphp
                                        @foreach($payrollsid as $payrolls)
                                            <tr>
                                                <td>{{$idl++}}</td>
                                                <td>{{$payrolls->first_name}} {{$payrolls->last_name}}</td>
                                                <td>
                                                    @if($payrolls->month == 1) มกราคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 2) กุมภาพันธ์ {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 3) มีนาคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 4) เมษายน {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 5) พฤษภาคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 6) มิถุนายน {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 7) กรกฎาคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 8) สิงหาคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 9) กันยายน {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 10) ตุลาคม {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 11) พฤศจิกายน {{$payrolls->year+543}}
                                                    @elseif($payrolls->month == 12) ธันวาคม {{$payrolls->year+543}}
                                                    @endif
                                                </td>
                                                {{--                                    <td>--}}
                                                {{--                                    <a href="{{route('payrolls.show',$payroll->emp_id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">receipt_long</i></a>--}}
                                                {{--                                    </td>--}}
                                                {{--                                    <td>--}}
                                                {{--                                        <form action="{{route('payrolls.destroy',$payroll->id)}}" method="POST">--}}
                                                {{--                                            @method('DELETE')--}}
                                                {{--                                            @csrf()--}}
                                                {{--                                            <button class="btn btn-floating btn-small waves=effect waves-light red" type="submit"><i class="material-icons">delete</i></button>--}}
                                                {{--                                        </form>--}}

                                                {{--                                    </td>--}}
                                                <td>
                                                    <div class="row mb-0">
                                                        <div class="col">
                                                            <a href="{{route('payrolls.show',Crypt::encrypt($payrolls->id))}}"
                                                               class="btn btn-floating btn-small waves=effect waves-light teal"><i
                                                                        class="material-icons">receipt_long</i></a>
                                                        </div>
                                                        {{--                                                <div class="col">--}}
                                                        {{--                                                    <form action="{{route('payrolls.destroy',Crypt::encrypt($payrolls->id))}}"--}}
                                                        {{--                                                          method="POST">--}}
                                                        {{--                                                        @method('DELETE')--}}
                                                        {{--                                                        @csrf()--}}
                                                        {{--                                                        <button type="submit"--}}
                                                        {{--                                                                class="btn btn-floating btn-small waves=effect waves-light red"--}}
                                                        {{--                                                                onclick="return confirm('คุณต้องการลบสลิปเงินเดือนของ {{$payrolls->first_name}} {{$payrolls->last_name}} หรือไม่?')">--}}
                                                        {{--                                                            <i class="material-icons">delete</i></button>--}}
                                                        {{--                                                    </form>--}}
                                                        {{--                                                </div>--}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if(isset($search))
                                            <tr>
                                                <td colspan="4">
                                                    <a href="/payments" class="right">Show All</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @else
                                        {{-- if there are no employees then show this message --}}
                                        <tr>
                                            <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูล!</h6>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <!-- employees Table END -->
                            </div>
                            <!-- Show Pagination Links -->
                        </div>
                    </div>


            @endif



            <!-- Card END -->
            </div>
            <!-- This is the button that is located at the right bottom, that navigates us to employees.create view -->
    {{--<div class="fixed-action-btn">--}}
    {{--    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('employees.create')}}">--}}
    {{--        <i class="large material-icons">add</i>--}}
    {{--    </a>--}}
    {{--</div> --}}
@endsection