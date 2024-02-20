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
  //  public function __construct()
  //  {
        // Apply the CheckAdmin middleware to all methods in this controller
   //     $this->middleware('admin');
   // }

    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        // Fetch all jobs
        $jobs = Job::all();

        // Return view with jobs data
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        // Fetch all jobs
        $jobs = Job::all();

        // Output jobs to the console
        foreach ($jobs as $job) {
            echo "Job ID: " . $job->id . "\n";            
            echo "Job Title: " . $job->name . "\n";
            echo "Job Company: " . $job->company->name . "\n";
            echo "Job Category: " . $job->category->name . "\n";
            
        }
    }*/

    public function index()
    {
        // Fetch all jobs with their related company and category
        $jobs = Job::with('company', 'category')->get();

        // Pass the jobs to the view
        return view('adminboard', compact('jobs'));
    }
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
        // Return the job details
        return response()->json($job);
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

            // Return the updated job details
            return response()->json($job);
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