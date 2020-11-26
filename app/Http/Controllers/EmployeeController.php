<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = DB::table('companies')
                            ->join('employees','companies.id', '=', 'employees.company_id')->paginate(5,['employees.*','companies.name as company_name']);
        // return response()->json($data);
        return view('employees')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = Company::get();
        return view('newEmployee')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
            'email' => 'required|email',
            'company_id' => 'required',
        ]);

        Employee::create($request->all());

        return redirect(route('employees'));
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
        $data['companies'] = Company::get();
        $data['employee'] = Employee::where('id',$id)->get();

        return view('editEmployee')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
            'email' => 'required|email',
            'company_id' => 'required',
        ]);
        
        Employee::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ]);
        
        return redirect(route('employees'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect()->back();
    }
}
