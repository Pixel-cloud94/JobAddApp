<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply the CheckAdmin middleware to all methods in this controller
        $this->middleware('checkAdmin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all companies
        $companies = Company::all();

        // Return view with companies data
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view for creating a new company
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        // Store the newly created company
        Company::create($request->validated());

        // Redirect to the index page
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        // Return view with company data
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        // Return view for editing a specific company
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // Update the specific company
        $company->update($request->validated());

        // Redirect to the index page
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Delete the specific company
        $company->delete();

        // Redirect to the index page
        return redirect()->route('companies.index');
    }
}