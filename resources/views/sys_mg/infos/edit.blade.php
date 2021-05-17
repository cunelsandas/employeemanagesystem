@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">แก้ไขข้อมูลหน่วยงาน</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('infos.update',$info->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="input-field">
                                <i class="material-icons prefix">home</i>
                                <input type="text" name="org_name" id="org_name" value="{{Request::old('org_name') ? : $info->org_name}}">
                                <label for="sso_month">ชื่อหน่วยงาน</label>
                                <span class="{{$errors->has('org_name') ? 'helper-text red-text' : ''}}">{{$errors->first('org_name')}}</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="header_name" id="header_name" value="{{Request::old('header_name') ? : $info->header_name}}">
                                <label for="header_name">ชื่อผู้อำนวยการกองคลัง</label>
                                <span class="{{$errors->has('header_name') ? 'helper-text red-text' : ''}}">{{$errors->first('header_name')}}</span>
                            </div>
                            <div class="file-field input-field col s12 m12 l12 xl8 offset-xl2">
                                <div class="btn">
                                    <span>รูปภาพลายเซ็น</span>
                                    <input type="file" name="picture">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="{{Request::old('picture') ? : $info->picture}}">
                                    <span class="{{$errors->has('picture') ? 'helper-text red-text' : ''}}">{{$errors->has('picture') ? $errors->first('picture') : ''}}</span>
                                </div>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">อัพเดท</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/infos">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection