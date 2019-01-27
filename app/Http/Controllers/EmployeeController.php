<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        $companies = Company::all();
        return view('employees.index',compact('employees','companies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('employees.create',compact('companies'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric'
        ]);
        $input = $request->all();
        //return $input;
        Employee::create($input);
        session()->flash('flash_message',  trans('lang.employee_added'));
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show' , compact('employee'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $employee = Employee::findOrFail($id);
        return view('employees.edit',compact('employee','companies'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $employee = Employee::findOrFail($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric'
        ]);

        $input = $request->all();

        $employee->fill($input)->save();

        session()->flash('flash_message', trans('lang.employee_update'));

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee= Employee::findOrFail($id);
        $employee->delete();
        session()->flash('flash_message', trans('lang.employee_delete'));

        return redirect()->route('employees.index');

    }
}
