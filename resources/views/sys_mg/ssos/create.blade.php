@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">เพิ่มข้อมูลประกันสังคม</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('ssos.store')}}" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">attach_money</i>
                                <input type="number" name="sso_month" id="sso_month" min="0" class="validate" value="{{ Request::old('sso_month') ? : '' }}">
                                <label for="sso_month">เดือน</label>
                                <span class="{{$errors->has('sso_month') ? 'helper-text red-text' : '' }}">{{$errors->first('sso_month')}}</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">attach_money</i>
                                <input type="number" name="sso_percent" id="sso_percent" min="0" class="validate" value="{{ Request::old('sso_percent') ? : '' }}">
                                <label for="sso_percent">หัก %</label>
                                <span class="{{$errors->has('sso_percent') ? 'helper-text red-text' : '' }}">{{$errors->first('sso_percent')}}</span>
                            </div>
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a href="/ssos">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
@endsection