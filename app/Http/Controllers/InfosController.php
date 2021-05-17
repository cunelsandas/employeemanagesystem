<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;
use App\Info;

class InfosController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct()
    {
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

        $info = Info::paginate(12);
        return view('sys_mg.infos.index')->with('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_mg.infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'org_name',
            'header_name',
            'picture' => 'required|max:2048'
        ]);
        $image = $request->file('picture');
        $new_name = 'signature.png';
        $image->move(public_path("storage"),$new_name);


        $info = new Info();
        $info->org_name = $request->input('org_name');
        $info->header_name = $request->input('header_name');
        $info->picture = $new_name;


        $info->save();
        return redirect('/infos')->with('info', 'Info has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::find($id);
        return view('sys_mg.infos.edit')->with('info', $info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'org_name',
            'header_name',
            'picture' => 'required|max:2048'
        ]);

        $image = $request->file('picture');
        $new_name = 'signature.png';
        $image->move(public_path("storage"),$new_name);

        $info = Info::find($id);
        $info->org_name = $request->input('org_name');
        $info->header_name = $request->input('header_name');
        $info->save();
        return redirect('/infos')->with('info', 'Selected SSO has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sso = Sso::find($id);
        $sso->delete();
        return redirect('/infos')->with('info', 'Selected SSO has been deleted!');
    }

    /**
     *  Search For Resource(s)
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $sso = Sso::where('sso_percent', 'LIKE', '%' . $str . '%')
            ->orderBy('sso_percent', 'asc')
            ->paginate(12);
        return view('sys_mg.infos.index')->with(['sso' => $sso, 'search' => true]);
    }
}
