@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-1 center">การจัดการพนักงาน</h4>
    {{-- Search --}}
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
                                <input id="search" type="text" name="search" >
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
    <div class="card">
        <div class="card-content">
            <div class="row">
                <h5 class="pl-15 grey-text text-darken-2">รายชื่อพนักงาน</h5>
                <!-- Table that shows Employee List -->
                <table class="responsive-table col s12 m12 l12 xl12">
                    <thead class="grey-text text-darken-1">
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>แผนก</th>
                            <th>สายงาน</th>
                            <th>วันที่เข้าทำงาน</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody id="emp-table">
                        <!-- Check if there are any employee to render in view -->
                        @if($employees->count())
                            @php $i = 1; @endphp
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                    <img class="emp-img" src="{{asset('storage/employee_images/'.$employee->picture)}}">
                                    </td>
                                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                    <td>{{$employee->empDepartment->dept_name}}</td>
                                    <td>{{$employee->empDivision->division_name}}</td>
                                    <td>{{Thaidateonly($employee->join_date)}}</td>
                                    <td>
                                    <a href="{{route('employees.show',$employee->id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">list</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if(isset($search))
                                <tr>
                                    <td colspan="4">
                                        <a href="/employees" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        @else
                            {{-- if there are no employees then show this message --}}
                            <tr>
                                <td colspan="5"><h6 class="grey-text text-darken-2 center">ไม่พบข้อมูลพนักงาน!</h6></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- employees Table END -->
            </div>
            <!-- Show Pagination Links -->
            <div class="center">
                {{$employees->links('vendor.pagination.default',['paginator' => $employees])}}
            </div>
        </div>
    </div>
    <!-- Card END -->
</div>
<!-- This is the button that is located at the right bottom, that navigates us to employees.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('employees.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection