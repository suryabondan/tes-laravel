<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['companies'] = Company::paginate(5);

       return view('companies')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newCompany');
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
            'logo' => 'mimes:jpeg,png|max:2000',
            'website' => 'required',
        ]);

        $file = $request->file('logo');

        $file->storeAs('public',$file->getClientOriginalName());
        
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $file->getClientOriginalName(),
            'website' => $request->website
        ]);
        
        return redirect(route('companies'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['company'] = Company::where('id',$id)->get();

        // return response()->json($data);
        return view('editCompany')->with($data);
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
            'logo' => 'mimes:jpeg,png|max:2000',
            'website' => 'required',
        ]);

        $file = $request->file('logo');

        $file->storeAs('public',$file->getClientOriginalName());
        
        Company::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $file->getClientOriginalName(),
            'website' => $request->website
        ]);
        
        return redirect(route('companies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();

        return redirect()->back();
    }
}
