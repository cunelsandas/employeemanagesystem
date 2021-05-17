<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;
use App\Sso;

class SsosController extends Controller
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
        /**
         *  read all the comments from DepartmentsController
         *  they are all the same.
         */
        
        $sso = Sso::paginate(12);
        return view('sys_mg.ssos.index')->with('sso',$sso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_mg.ssos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sso_percent' => 'required|min:1',
            'sso_month' => 'required|min:1'
        ]);
        $sso = new Sso();
        $sso->sso_percent = $request->input('sso_percent');
        $sso->sso_month = $request->input('sso_month');
        $sso->save();
        return redirect('/ssos')->with('info','SSO has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sso = Sso::find($id);
        return view('sys_mg.ssos.edit')->with('sso',$sso);
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
        $this->validate($request,[
            'sso_percent' => 'required|min:1',
            'sso_month' => 'required|min:1'
        ]);
        $sso = Sso::find($id);
        $sso->sso_percent = $request->input('sso_percent');
        $sso->sso_month = $request->input('sso_month');
        $sso->save();
        return redirect('/ssos')->with('info','Selected SSO has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sso = Sso::find($id);
        $sso->delete();
        return redirect('/ssos')->with('info','Selected SSO has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $sso = Sso::where( 'sso_percent' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('sso_percent','asc')
            ->paginate(12);
        return view('sys_mg.ssos.index')->with([ 'sso' => $sso ,'search' => true ]);
    }
}
