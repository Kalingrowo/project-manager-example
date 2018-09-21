<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();

        return view('companies.index', ['companies' => $companies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        //$comp = Company::where('id', $company->id)->first();
        $comp = Company::find($company->id);

        return view('companies.show', ['company'=>$comp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $comp = Company::where('id', $company->id)->first();

        return view('companies.edit', ['company'=>$comp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $compUpdate = Company::where('id', $company->id)
                              ->update([
                                'name' => $request->input('name'),
                                'description' => $request->input('description')
                              ]);

        if($compUpdate){
          return redirect()->route('companies.show', ['company'=>$company->id])
                          ->with('success', 'Company update success');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $findCompany = Company::where('id', $company->id)->first();

        if($findCompany->delete()){
          return redirect()->route('companies.index')
                ->with('success', 'Company deleted succesfully !');
        }

        return back()->withInput()->with('error', 'Company could not be deleted !');

    }
}
