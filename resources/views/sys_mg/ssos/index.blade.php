@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">SSO Management</h4>
    
    {{-- Include the searh component with with title and route --}}
{{--    @component('sys_mg.inc.search',['title' => 'เงินเดือน' , 'route' => 'salaries.search' , 'type' => 'number'])--}}
{{--    @endcomponent--}}

    <div class="row">
        <!-- Show All Departments List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">รายการประกันสังคม</h5>
                    <!-- Table that shows Departments List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>เดือน</th>
                                <th>หัก %</th>

                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any salaries to render in view -->
                            @if($sso->count())
                                @foreach($sso as $ss)
                                    <tr>
                                        <td>{{$ss->id}}</td>
                                        <td>@if($ss->sso_month==1) มกราคม
                                            @elseif($ss->sso_month==2) กุมภาพันธ์
                                            @elseif($ss->sso_month==3) มีนาคม
                                            @elseif($ss->sso_month==4) เมษายน
                                            @elseif($ss->sso_month==5) พฤษภาคม
                                            @elseif($ss->sso_month==6) มิถุนายน
                                            @elseif($ss->sso_month==7) กรกฎาคม
                                            @elseif($ss->sso_month==8) สิงหาคม
                                            @elseif($ss->sso_month==9) กันยายน
                                            @elseif($ss->sso_month==10) ตุลาคม
                                            @elseif($ss->sso_month==11) พฤศจิกายน
                                            @elseif($ss->sso_month==12) ธันวาคม
                                            @endif

                                        </td>
                                        <td>{{$ss->sso_percent}} %

                                        </td>
{{--                                        <td>{{$salary->created_at}}</td>--}}
{{--                                        <td>{{$salary->updated_at}}</td>--}}
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    <a href="{{route('ssos.edit',$ss->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('ssos.destroy',$ss->id)}}" method="POST">
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
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">No SSO found yet!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/ssos" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Salaries Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$sso->links('vendor.pagination.default',['paginator' => $sso])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to salaries.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('ssos.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection