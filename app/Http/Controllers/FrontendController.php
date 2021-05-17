<?php

namespace App\Http\Controllers;

use App\Ems;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Employee;

class FrontendController extends Controller
{
    /**
     * Show Dashboard View
     *
     * @return View
     *
     */


    public function index(){


        $employees = Employee::get();



        return view('frontend.login')->with('employees',$employees);

    }

    public function index2(){


        $employees = Employee::get();



        return view('frontend.login')->with('employees',$employees);

    }

    public function EmsIndex()
    {

        Auth::guard('Ems')->logout();
        return view('frontend.login');
    }

    public function EmsLogin(Request $request)
    {
        Auth::guard('Ems')->logout();
        $getuser = $request->post('username');
        $getpass =  $request->post('password');

        $user_id = DB::table('employees')->where('email', '=', $getuser)->first();
        if ($user_id === null) {
            return redirect()->back()->with(['error_login' => 'กรุณากรอกข้อมูลให้ถูกต้อง']);
        }



        $employees_id = DB::table('employees')
            ->where([
                ['phone', '=', $getpass],
                ['email','=', $getuser],
            ])
            ->first();

        if ($employees_id === null) {
            return redirect()->back()->with(['error_login' => 'กรุณาตรวจสอบอีเมล หรือรหัสให้ถูกต้อง first']);
        }
        $user = Employee::where([
            'phone' =>  $employees_id->phone,
            'email' => $employees_id->email,
        ])
            ->first();

        if ($user) {
//            Auth::guard('Ems')->login($user);
            session(['EmpID' => $getpass]);
            return redirect('/index');
        } else {
            return redirect()->back()->withInput($request->all())->with(['error_login' => 'กรุณาตรวจสอบอีเมล หรือรหัสให้ถูกต้อง second']);
        }
    }
}
