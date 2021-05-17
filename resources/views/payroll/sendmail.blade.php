@extends('layouts.app')
@section('content')
    <div class="content-box">
        <div class="card">
            <div class="card-body">เงินเดือน/Salary</div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan='3'>สถานะการส่งสลิปเงินเดือน @if($monthformail == 1)มกราคม
                        @elseif($monthformail == 2)กุมภาพันธ์
                        @elseif($monthformail == 3)มีนาคม
                        @elseif($monthformail == 4)เมษายน
                        @elseif($monthformail == 5)พฤษภาคม
                        @elseif($monthformail == 6)มิถุนายน
                        @elseif($monthformail == 7)กรกฎาคม
                        @elseif($monthformail == 8)สิงหาคม
                        @elseif($monthformail == 9)กันยายน
                        @elseif($monthformail == 10)ตุลาคม
                        @elseif($monthformail == 11)พฤศจิกายน
                        @elseif($monthformail== 12)ธันวาคม
                        @endif พ.ศ.{{Thaiyearonly($yearformail)}}
                    </th>
                </tr>
                <tr>
                    <th>ชื่อ-นามสกุล</th>
                    <th>E-mail</th>
                    <th>สถานะ</th>
                </tr>
                </thead>
                <tbody>
                @php
                    echo $table;
                @endphp
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

@endsection
