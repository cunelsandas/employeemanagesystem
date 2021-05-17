<?php

namespace App\Http\Controllers;

use App\Payment;
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
use DB;
use App\Sso;

class PaymentsController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::Paginate(50);
        return view('payment.index')->with('employees',$employees);
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
        $employee = Employee::find($id);
        return view('employee.show')->with('employee',$employee);
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

        $sso_pay = Sso::get();

        $employee = Employee::find($id);
        return view('payment.edit')->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders,
            'employee'     => $employee,
            'sso_pay'      => $sso_pay
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
        $employee = Employee::find($id);
        $employee->delete();
        Storage::delete('public/employee_images/'.$employee->picture);
        return redirect('/employees')->with('info','Selected Employee has been deleted!');
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
            'year'        =>  'required',
            'salary'        =>  'required',

            //ส่วนรับ
            'money_extra'          =>  'required|max:13',
            'money_extra_position'          =>  'required|max:13',
            'money_treatment_cost'          =>  'required|max:13',
            'money_rent_home'          =>  'required|max:13',
            'money_recurring_salary'          =>  'required|max:13',
            'money_bonus'          =>  'required|max:13',
            'money_child_edu'          =>  'required|max:13',
            //รวมรับ
            'salary_amount'         =>  'required',


            //ส่วนจ่าย
            'sso_pay'     =>  'required',
            'saving_group_pay'       =>  'required',
            'saving_dcd_pay'         =>  'required',
            'saving_teacher_pay'          =>  'required',
            'saving_moe_pay'          =>  'required',
            'loan_gsb_pay'          =>  'required',
            'loan_baac_pay'          =>  'required',
            'loan_ktb_pay'          =>  'required',
            'loan_student_pay'          =>  'required',
            'loan_ghb_pay'          =>  'required',
            'saving_local_pay'          =>  'required',
            'tax_pay'          =>  'required',
            //รวมจ่าย
            'pay_amount'           =>  'required',
            //รวมรับ-จ่าย
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
        $payment->year        = $request->input('year');
        $payment->salary        = $request->input('salary');
        //รายรับ
        $payment->money_extra          = $request->input('money_extra');
        $payment->money_extra_position          = $request->input('money_extra_position');
        $payment->money_treatment_cost          = $request->input('money_treatment_cost');
        $payment->money_rent_home          = $request->input('money_rent_home');
        $payment->money_recurring_salary          = $request->input('money_recurring_salary');
        $payment->money_bonus          = $request->input('money_bonus');
        $payment->money_child_edu          = $request->input('money_child_edu');

        //รวมรับ
        $payment->salary_amount      = $request->input('salary_amount');

        //รายจ่าย
        $payment->sso_pay        = $request->input('sso_pay');
        $payment->saving_group_pay        = $request->input('saving_group_pay');
        $payment->saving_dcd_pay        = $request->input('saving_dcd_pay');
        $payment->saving_teacher_pay        = $request->input('saving_teacher_pay');
        $payment->saving_moe_pay        = $request->input('saving_moe_pay');
        $payment->loan_gsb_pay        = $request->input('loan_gsb_pay');
        $payment->loan_baac_pay        = $request->input('loan_baac_pay');
        $payment->loan_ktb_pay        = $request->input('loan_ktb_pay');
        $payment->loan_student_pay        = $request->input('loan_student_pay');
        $payment->loan_ghb_pay    = $request->input('loan_ghb_pay');
        $payment->saving_local_pay    = $request->input('saving_local_pay');
        $payment->tax_pay    = $request->input('tax_pay');


        //รวมจ่าย
        $payment->pay_amount      = $request->input('pay_amount');
        //รวมรับ-จ่าย
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
