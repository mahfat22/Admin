<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\AddCompanyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::paginate(10);
        return view('companies.index',compact('companies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        //return $request->logo;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:companies'
        ]);
        if ($request->logo) {
            $image = $request->file('logo');
            $name_img = time() . '.' . $image->getClientOriginalExtension();

            $path = storage_path('app/public/'.$name_img);
            Image::make($image->getRealPath())->resize(100, 100)->save($path);
            $request->logo = $name_img;
        }

        $input =[
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'logo'=>$request->logo,
        ];

        Company::create($input);
//        $company = $request->all();
        if ($request->has('email')){
            Mail::to($request->email)->send(new AddCompanyMail($input));
        }

        session()->flash('flash_message',  trans('lang.company_added'));
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
        $company = Company::findOrFail($id);
        return view('companies.show' , compact('company'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit',compact('company'));
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
        $company = Company::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($request->logo) {
            $image = $request->file('logo');
            $name_img = time() . '.' . $image->getClientOriginalExtension();

            $path = storage_path('app/public/'.$name_img);
            Image::make($image->getRealPath())->resize(100, 100)->save($path);
            $request->logo = $name_img;
        }

        $input =[
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'logo'=>$request->logo,
        ];

        $company->fill($input)->save();

        session()->flash('flash_message', trans('lang.company_update'));

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
        $company= Company::findOrFail($id);
        $company->delete();
        session()->flash('flash_message', trans('lang.company_delete'));

        return redirect()->route('company.index');

    }
}
