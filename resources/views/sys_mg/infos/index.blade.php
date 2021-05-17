@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">ข้อมูลหน่วยงาน</h4>
    
    {{-- Include the searh component with with title and route --}}
{{--    @component('sys_mg.inc.search',['title' => 'เงินเดือน' , 'route' => 'salaries.search' , 'type' => 'number'])--}}
{{--    @endcomponent--}}

    <div class="row">
        <!-- Show All Departments List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2"></h5>
                    <!-- Table that shows Departments List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>ชื่อองค์กร</th>
                                <th>ชื่อผู้อำนวยการกองคลัง</th>
                                <th>ลายเซ็น</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any salaries to render in view -->
                            @if($info->count())
                                @foreach($info as $inf)
                                    <tr>
                                        <td>{{$inf->id}}</td>
                                        <td>{{$inf->org_name}}</td>
                                        <td>{{$inf->header_name}}</td>
                                        <td><img style="width: 200px;height: 100px;" class="emp-img" src="{{asset('storage/signature.png')}}"></td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    <a href="{{route('infos.edit',$inf->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('infos.destroy',$inf->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <!-- if there are no salaries then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">No INFO found yet!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/infos" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Salaries Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$info->links('vendor.pagination.default',['paginator' => $info])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to salaries.create view -->
{{--<div class="fixed-action-btn">--}}
{{--    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('infos.create')}}">--}}
{{--        <i class="large material-icons">add</i>--}}
{{--    </a>--}}
{{--</div> --}}
@endsection