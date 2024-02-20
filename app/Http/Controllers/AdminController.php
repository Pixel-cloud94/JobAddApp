<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $jobs = Job::with('company', 'category')->get();

        $first_name = auth()->user()->first_name;

        $image = auth()->user()->image;

        $id = auth()->user()->id;

        
        $users = User::all();
        $companies = Company::all();
        $categories = Category::all();

       
        return view('adminboard', compact('jobs', 'users', 'first_name', 'image', 'id', 'companies', 'categories'));
    }

    public function deleteSelectedUser(Request $request)
    {

        $selectedIds = $request->input('users');

        User::whereIn('id', $request->input('users'))->delete();

        return redirect()->route('adminboard')->with('success', 'Selected users deleted successfully.');
    }

    public function deleteSelectedJob(Request $request)
    {

        $selectedIds = $request->input('jobs');

        Job::whereIn('id', $request->input('jobs'))->delete();

        return redirect()->route('adminboard')->with('success', 'Selected jobs deleted successfully.');
    }
    public function updatejobs(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'name' => 'required',
            'company_id' => 'required|exists:company,id',
            'category_id' => 'required|exists:category,id',
        ]);

        $job = Job::find($request->job_id);
        $job->name = $request->name;
        $job->company_id = $request->company_id;
        $job->category_id = $request->category_id;
        $job->save();

        return redirect()->route('adminboard')->with('success', 'Job updated successfully.');
    }
        
    

    public function addjobsPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:company,id',
            'category_id' => 'required|exists:category,id',
        ]);
    
        $job = Job::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('adminboard')->with('status', 'Job added successfully!');
    }

    public function updateusersPost(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isAdmin' => 'required',
            
        ]);

        $user = User::find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $user->image = $filename;
        }
        $user->isAdmin = $request->isAdmin;
        $user->save();

        return redirect()->route('adminboard')->with('success', 'User updated successfully.');
    }
        
    

}


