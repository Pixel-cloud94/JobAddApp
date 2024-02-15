<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
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
        // Fetch all jobs
        $jobs = Job::all();

        // Return view with jobs data
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view for creating a new job
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        // Store the newly created job
        Job::create($request->validated());

        // Redirect to the index page
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        // Return view with job data
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // Return view for editing a specific job
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        // Update the specific job
        $job->update($request->validated());

        // Redirect to the index page
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        // Delete the specific job
        $job->delete();

        // Redirect to the index page
        return redirect()->route('jobs.index');
    }
}