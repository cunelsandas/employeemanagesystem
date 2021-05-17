<?php

namespace App\Http\Controllers;

use App\Payment;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\Department;
use App\Country;
use App\City;
use App\Salary;
use App\Division;
use App\State;
use App\Gender;
use App\Info;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\URL;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PayrollsController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     *
     */


    public function SendEmailSlip(Request $request){

        $this->validate($request,[
            'monthselectformail' => 'required',
            'yearinputformail'   => 'required'
        ]);

        $info_data = Info::first();

        $monthformail = $request->input('monthselectformail');
        $yearformail = $request->input('yearinputformail');

        $mail_datas=DB::table('tb_payments')->join('employees','employees.id','=','tb_payments.emp_id')
            ->where('month','=',$monthformail)->where('year','=',$yearformail)->get();


        $table="";
        $domain = URL::to('/');


        foreach($mail_datas as $data){



            $msg_detail = "<div id='printarea'>";
            $msg_detail .= "<div class='row'>";
            $msg_detail .= "<img src='cid:logo_2u' alt='' title=''/>";
            $msg_detail .= "<p>รายละเอียดการจ่ายเงินเดือนและค่าจ้างรายเดือน</p>";
            $msg_detail .= "<p>ของ$info_data->org_name</p>";
            $msg_detail .= "<p>รายรับ-รายจ่าย</p>";
            if($data->month == 1) {$msg_detail .= "<p>ประจำเดือน มกราคม";}
            elseif($data->month == 2) {$msg_detail .= "<p>ประจำเดือน กุมภาพันธ์";}
            elseif($data->month == 3) {$msg_detail .= "<p>ประจำเดือน มีนาคม";}
            elseif($data->month == 4) {$msg_detail .= "<p>ประจำเดือน เมษายน";}
            elseif($data->month == 5) {$msg_detail .= "<p>ประจำเดือน พฤษภาคม";}
            elseif($data->month == 6) {$msg_detail .= "<p>ประจำเดือน มิถุนายน";}
            elseif($data->month == 7) {$msg_detail .= "<p>ประจำเดือน กรกฎาคม";}
            elseif($data->month == 8) {$msg_detail .= "<p>ประจำเดือน สิงหาคม";}
            elseif($data->month == 9) {$msg_detail .= "<p>ประจำเดือน กันยายน";}
            elseif($data->month == 10) {$msg_detail .= "<p>ประจำเดือน ตุลาคม";}
            elseif($data->month == 11) {$msg_detail .= "<p>ประจำเดือน พฤศจิกายน";}
            elseif($data->month == 12) {$msg_detail .= "<p>ประจำเดือน ธันวาคม";}
            $msg_detail .= "  <p>ชื่อ-สกุล $data->first_name $data->last_name";
            $msg_detail .= "<br>
                        <p style='text-decoration: underline'>รายการรับ</p>";
            $msg_detail .= "<p>เงินเดือน  ". number_format($data->salary,2) ."บาท"."</p>";
            $msg_detail .= "<p>เงินเพิ่มค่าครองชีพ  ". number_format($data->money_extra,2) ."บาท"."</p>";
            if($data->money_extra_position != 0) {
                $msg_detail .= "<p>เงินประจำตำแหน่ง  " . number_format($data->money_extra_position, 2) . "บาท" . "</p>";
            }
            if($data->money_treatment_cost != 0) {
                $msg_detail .= "<p>ค่ารักษาพยาบาล  " . number_format($data->money_treatment_cost, 2) . "บาท" . "</p>";
            }
            if($data->money_rent_home != 0) {
                $msg_detail .= "<p>ค่าเช่าบ้าน  " . number_format($data->money_rent_home, 2) . "บาท" . "</p>";
            }
            if($data->money_recurring_salary != 0) {
                $msg_detail .= "<p>ตกเบิกเงินเดือน  " . number_format($data->money_recurring_salary, 2) . "บาท" . "</p>";
            }
            if($data->money_bonus != 0) {
                $msg_detail .= "<p>โบนัส  " . number_format($data->money_bonus, 2) . "บาท" . "</p>";
            }
            if($data->money_child_edu != 0) {
                $msg_detail .= "<p>ค่าช่วยเหลือการศึกษาบุตร  " . number_format($data->money_child_edu, 2) . "บาท" . "</p>";
            }
            $msg_detail .= "<p><b>รวมรับทั้งสิ้น  ". number_format($data->salary_amount,2) ."บาท"."</b></p>";


            $msg_detail .= "<br>
                    <p style='text-decoration: underline'>รายการจ่าย</p>";
            if($data->sso_pay != 0) {
                $msg_detail .= "<p>ประกันสังคม  " . number_format($data->sso_pay, 2) . "บาท" . "</p>";
            }
            if($data->saving_group_pay != 0) {
                $msg_detail .= "<p>กลุ่มออมทรัพย์พนักงาน  " . number_format($data->saving_group_pay, 2) . "บาท" . "</p>";
            }
            if($data->saving_dcd_pay != 0) {
                $msg_detail .= "<p>สหกรณ์ออมทรัพย์กรมการพัฒนาชุมชน  " . number_format($data->saving_dcd_pay, 2) . "บาท" . "</p>";
            }
            if($data->saving_teacher_pay != 0) {
                $msg_detail .= "<p>สหกรณ์ออมทรัพย์ครู  " . number_format($data->saving_teacher_pay, 2) . "บาท" . "</p>";
            }
            if($data->saving_moe_pay != 0) {
                $msg_detail .= "<p>สหกรณ์ออมทรัพย์ข้าราชการกระทรวงศึกษาธิการ  " . number_format($data->saving_moe_pay, 2) . "บาท" . "</p>";
            }
            if($data->loan_gsb_pay != 0) {
                $msg_detail .= "<p>เงินกู้ธนาคารออมสิน  " . number_format($data->loan_gsb_pay, 2) . "บาท" . "</p>";
            }
            if($data->loan_baac_pay != 0) {
                $msg_detail .= "<p>เงินกู้ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร  " . number_format($data->loan_baac_pay, 2) . "บาท" . "</p>";
            }
            if($data->loan_ktb_pay != 0) {
                $msg_detail .= "<p>เงินกู้ธนาคารกรุงไทย  " . number_format($data->loan_ktb_pay, 2) . "บาท" . "</p>";
            }
            if($data->loan_student_pay != 0) {
                $msg_detail .= "<p>เงินกู้กยศ.  " . number_format($data->loan_student_pay, 2) . "บาท" . "</p>";
            }
            if($data->loan_ghb_pay != 0) {
                $msg_detail .= "<p>เงินกู้ธนาคารอาคารสงเคราะห์  " . number_format($data->loan_ghb_pay, 2) . "บาท" . "</p>";
            }
            if($data->saving_local_pay != 0) {
                $msg_detail .= "<p>สหกรณ์ออมทรัพย์ข้าราชการส่วนท้องถิ่นจำกัด  " . number_format($data->saving_local_pay, 2) . "บาท" . "</p>";
            }
            if($data->tax_pay != 0) {
                $msg_detail .= "<p>ภาษีหัก ณ ที่จ่าย  " . number_format($data->tax_pay, 2) . "บาท" . "</p>";
            }
            $msg_detail .= "<p><b>รับสุทธิ   ". number_format($data->net_receive,2) ."บาท"."</b></p>";
            $msg_detail .= baht_text($data->net_receive);
            $msg_detail .= " <br>";
            $msg_detail .= "<img width='150px' src='$domain/storage/signature.png' alt='' title=''/>";
            $msg_detail .= "<p>$info_data->header_name</p>";
            $msg_detail .= "<p>(ผู้อำนวยการกองคลัง)</p>";

            $msg_detail .= "</div>";
            $msg_detail .= "</div>";

            // Phpmailer code
            $fm = "noreply@itglobal.co.th"; // *** ต้องใช้อีเมล์ @yourdomain.com เท่านั้น  ***
            $to = $data->email; //   **ต้องมี mail ในระบบไม่งั้น error
            $cc = 'info@sanklang.go.th'; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม

            $subj = 'คุณ'.$data->first_name.' '.$data->last_name.' สลิปเงินเดือน วันที่ .......';

            // -------------------------------------------------------------------
            $message = $msg_detail;

            // -------------------------------------------------------------------

            $mesg = $message;

            $mail = new PHPMailer();
            $mail->CharSet = "utf-8";

            $mail->SMTPDebug = 0; // 0ปิด 2เปิดแสดงdebug
            $mail->IsSMTP();

            $mail->Mailer = "smtp";
            $mail->SMTPAutoTLS = false; //false//true
            //$mail->SMTPSecure = 'ssl'; // บรรทัดนี้ ให้ Uncomment ไว้ เพราะ Mail Server ของโฮสต์ ไม่รองรับ SSL.
            $mail->Port = "25"; // หมายเลข Port สำหรับส่งอีเมล์ 25 // 465

            $mail->Host = "mail.itglobal.co.th"; //ใส่ SMTP Mail Server ของท่าน
            $mail->Username = "noreply@itglobal.co.th"; //ใส่ Email Username ของท่าน (ที่ Add ไว้แล้วใน Plesk Control Panel)
            $mail->Password = "456852aB"; //ใส่ Password ของอีเมล์ (รหัสผ่านของอีเมล์ที่ท่านตั้งไว้)
            //-------------------------------------------------------------------

            $mail->AddEmbeddedImage('storage/logo.png', 'logo_2u');
            $mail->SetFrom($fm,'องค์การบริหารส่วนตำบลสันกลาง');
            $mail->AddAddress($to);
            // $mail->AddReplyTo($custemail);
            $mail->addCC($cc);
            $mail->Subject = $subj;
            $mail->MsgHTML($mesg);
            $mail->WordWrap = 50;

//            send mail
            if($to==null){
                $table .="<tr><td>".$data->first_name." ".$data->last_name."</td><td>".$data->email."</td><td> Not Send no Email Address</td></tr>";
            }else{
                $send=$mail->Send();
                //check send ok
                if (!$send) {
                    $table .="<tr><td>".$data->first_name." ".$data->last_name."</td><td>".$data->email."</td><td> Send mail ERROR</td></tr>";
                }else{
                    $table .="<tr><td>".$data->first_name." ".$data->last_name."</td><td>".$data->email."</td><td> Send mail OK</td></tr>";
                }
            }

        }
//        return view('salary.sendmail',['table'=>$table,'salarydate'=>DateThai($dateinput)]);
        return view('payroll.sendmail',['table'=>$table,'monthformail'=>$monthformail,'yearformail'=>$yearformail]);
    }



    public function index()
    {


        $emp_id = auth()->user()->emp_id;

        $payrollsid = DB::table('tb_payments')->where('emp_id','=',$emp_id)->orderBy('month','asc')->get();



        $payrolls1 = DB::table('tb_payments')->where('month','=',1)->orderBy('id','desc')->Paginate(5);
        $payrolls2 = DB::table('tb_payments')->where('month','=',2)->orderBy('id','desc')->Paginate(5);
        $payrolls3 = DB::table('tb_payments')->where('month','=',3)->orderBy('id','desc')->Paginate(5);
        $payrolls4 = DB::table('tb_payments')->where('month','=',4)->orderBy('id','desc')->Paginate(5);
        $payrolls5 = DB::table('tb_payments')->where('month','=',5)->orderBy('id','desc')->Paginate(5);
        $payrolls6 = DB::table('tb_payments')->where('month','=',6)->orderBy('id','desc')->Paginate(5);
        $payrolls7 = DB::table('tb_payments')->where('month','=',7)->orderBy('id','desc')->Paginate(5);
        $payrolls8 = DB::table('tb_payments')->where('month','=',8)->orderBy('id','desc')->Paginate(5);
        $payrolls9 = DB::table('tb_payments')->where('month','=',9)->orderBy('id','desc')->Paginate(5);
        $payrolls10 = DB::table('tb_payments')->where('month','=',10)->orderBy('id','desc')->Paginate(5);
        $payrolls11 = DB::table('tb_payments')->where('month','=',11)->orderBy('id','desc')->Paginate(5);
        $payrolls12 = DB::table('tb_payments')->where('month','=',12)->orderBy('id','desc')->Paginate(5);

        return view('payroll.index')->with(['payrolls1'=>$payrolls1,'payrolls2'=>$payrolls2,'payrolls3'=>$payrolls3,
            'payrolls4'=>$payrolls4,'payrolls5'=>$payrolls5,'payrolls6'=>$payrolls6,'payrolls7'=>$payrolls7,
            'payrolls8'=>$payrolls8,'payrolls9'=>$payrolls9,'payrolls10'=>$payrolls10,'payrolls11'=>$payrolls11,
            'payrolls12'=>$payrolls12,
            'payrollsid'=>$payrollsid]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *  Get Departments so we can show department
         *  name on the department dropdown in the view
         */
        $departments = Department::orderBy('dept_name','asc')->get();
        /**
         *  this and other objects works the same as department
         */
        $countries = Country::orderBy('country_name','asc')->get();
        $cities = City::orderBy('city_name','asc')->get();
        $states = State::orderBy('state_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();
        $genders = Gender::orderBy('gender_name','asc')->get();
        /**
         *  return the view with an array of all these objects
         */
        return view('payment.create')->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  validateRequest is a method defined in this controller
         *  which will validate  the form. we have created
         *  it so we can reuse it in the update method with
         *  different parameters.
         */
        $this->validateRequest($request,null);

        /**
         *  Note!
         *  before using storage we need to link it to
         *  the public folder by typing the command,
         *  php artisan storage:link
         */

        /**
         *
         *  Handle the image file upload which will be stored
         *  in storage/app/public/employee_images
         */
        $fileNameToStore = $this->handleImageUpload($request);

        /**
         *  Create new object of Employee
         */
        $employee = new Employee();

        /**
         *  setEmployee is also a method of this controller
         *  which i have created, so i can use it for update
         *  method.
         */
        $this->setEmployee($employee,$request,$fileNameToStore);

        return redirect('/employees')->with('info','New Employee has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $employee = Employee::find($id);
        $payment = DB::table('tb_payments')->where('id','=',$id)->first();
        $info_data = Info::first();

      //  dd($payment);


        return view('payroll.show')->with(['employee'=>$employee,'payment'=>$payment,'info_data'=>$info_data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function makeReportPayroll($id){


        $employee = Employee::find($id);
        $payment = DB::table('tb_payments')->where('id','=',$id)->first();
        $info_data = Info::first();
        //generate pdf
        $pdf = PDF::loadView('payroll.report',['employee' => $employee,'payment'=>$payment,'info_data'=>$info_data])->setPaper('a4', 'portrait');
        return $pdf->stream('สลิป_'.$payment->month.'_'.$payment->first_name.'.pdf');
    }

    /**
     *  Generate PDF
     *
     * @return \Illuminate\Http\Response
     */
    public function makeReportPayrollAll(Request $request){
        $this->validate($request,[
            'monthselect' => 'required',
            'yearinput'   => 'required'
        ]);

        $month = $request->input('monthselect');
        $year = $request->input('yearinput');

        $employee = Employee::get();
        $payment = DB::table('tb_payments')->where('month','=',$month)->where('year','=',$year)->get();
        $info_data = Info::first();
        //dd($payment);
        //generate pdf
        $pdf = PDF::loadView('payroll.reportall',['employee' => $employee,'payment'=>$payment,'info_data'=>$info_data])->setPaper('a4', 'portrait');
        return $pdf->stream('สลิป_รวม'.date('m').'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         *  this is same as create but with an existing
         *  employee
         */
        $departments  = Department::orderBy('dept_name','asc')->get();
        $countries    = Country::orderBy('country_name','asc')->get();
        $cities       = City::orderBy('city_name','asc')->get();
        $states       = State::orderBy('state_name','asc')->get();
        $salaries     = Salary::orderBy('s_amount','asc')->get();
        $divisions    = Division::orderBy('division_name','asc')->get();
        $genders      = Gender::orderBy('gender_name','asc')->get();

        //dd($salaries);

        $employee = Employee::find($id);
        return view('payment.edit')->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders,
            'employee'     => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validateRequest($request,$id);
        $employee = DB::table('tb_payments');

        /**
         *  updating an existing employee with setEmployee
         *  method
         */
        $this->setEmployee($request);
        return redirect('/payments')->with('info','มีการอัพเดทข้อมูลรายรับรายจ่าย!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delpayrolls = Payment::find($id);
        $delpayrolls->delete();
//        Storage::delete('public/employee_images/'.$employee->picture);
        return redirect('/payrolls')->with('info','ลบข้อมูลแล้ว!');
    }

    /**
     *  Search For Resource(s)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search'   => 'required|min:1',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $employees = Employee::where($option, 'LIKE' , '%'.$str.'%')->Paginate(4);
        return view('employee.index')->with(['employees' => $employees , 'search' => true ]);
    }

    /**
     * This method is used for validating the form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    private function validateRequest($request,$id){
        /**
         *  specifying the validation rules
         */
        /**
         *  Below in Picture validation rules we are first checking
         *  that if there is an image, if not then don't apply the
         *  validation rules. the reason we are doing this is because
         *  if we are updating an employee but not updating the image.
         */
        return $this->validate($request,[
            'emp_id' => 'required',
            'first_name' =>  'required',
            'last_name'   => 'required' ,
            'month'        =>  'required',
            'salary'        =>  'required',
            'money_extra'          =>  'required|max:13',
            'salary_amount'         =>  'required',
            'sso_pay'     =>  'required',
            'saving_group_pay'       =>  'required',
            'saving_co_pay'         =>  'required',
            'tax_pay'          =>  'required',
            'pay_amount'           =>  'required',
            'net_receive'        =>  'required'
            /**
             *  if we are updating an employee but not changing the
             *  email then this will throw a validation error saying
             *  that email should be unique. that's why we need to specify
             *  the current employee to ignore the unique validation rule.
             *  Above in email rules , we are using a ternary operator simply
             *  saying that if we pass an id then it will ignore that employee
             *  (which we want in update) and if id's null then it will check
             *  every employee to be unique (which we want in create because
             *  every employee should have a unique email).
             *  check the documentation for more details,
             *  https://laravel.com/docs/5.6/validation#rule-unique
             */


        ]);
    }

    /**
     * Save a new resource or update an existing resource.
     *
     * @param  App\Payment $Payment
     * @param  \Illuminate\Http\Request  $request
     * @param  string $fileNameToStore
     * @return Boolean
     */
    private function setEmployee(Request $request){
        $payment = new Payment();
        $payment->emp_id   = $request->input('emp_id');
        $payment->first_name   = $request->input('first_name');
        $payment->last_name    = $request->input('last_name');
        $payment->month        = $request->input('month');
        $payment->salary        = $request->input('salary');
        $payment->money_extra          = $request->input('money_extra');
        $payment->salary_amount      = $request->input('salary_amount');
        $payment->sso_pay        = $request->input('sso_pay');
        //Format Date then insert it to the database
        $payment->saving_group_pay    = $request->input('saving_group_pay');
        $payment->saving_co_pay  = $request->input('saving_co_pay');
        $payment->tax_pay    = $request->input('tax_pay');
        $payment->pay_amount      = $request->input('pay_amount');
        $payment->net_receive      = $request->input('net_receive');

        /**
         *  we are checking if there is an image
         *  because if we are updating an employee
         *  but not changing the employee image then
         *  it will save  '' (means null) to picture field and we don't
         *  want that.
         */

        $payment->save();
    }

    /**
     * Handle image upload when creating a new resource
     * or updating an existing resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handleImageUpload(Request $request){
        if( $request->hasFile('picture') ){

            //get filename with extension
            $filenameWithExt = $request->file('picture')->getClientOriginalName();

            //get just filename
            $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);

            // get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();

            /**
             * filename to store
             *
             *  we are appending timestamp to the file name
             *  and prepending it to the file extension just to
             *  make the file name unique.
             */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload the image
            $path = $request->file('picture')->storeAs('public/employee_images',$fileNameToStore);
        }
        /**
         *  return the file name so we can add it to database.
         */
        return $fileNameToStore;
    }
}
