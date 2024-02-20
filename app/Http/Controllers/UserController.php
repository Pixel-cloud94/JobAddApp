<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $first_name = auth()->user()->first_name;
       $image = auth()->user()->image;
       $id =    auth()->user()->id;
       
       $jobs = Job::with('company', 'category')->get();

        
        return view('userboard', compact('jobs', 'first_name', 'image', 'id'));
    }

   
    /**
     * Display the specified resource.
     */
    /**
 * Display the specified resource.
 */
public function show(User $user)
{
    if (!Auth::user()->isAdmin) {
        abort(403, 'Unauthorized action.');
    }
    return view('users.show', compact('user'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateUserRequest $request, User $user)
{
    $request->validate([
        'username' => 'required|unique:users,username,'.$user->id,
        'email' => 'required|email|unique:users,email,'.$user->id,
    ]);

    $user->update([
        'username' => $request->username,
        'email' => $request->email,
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

public function uploadImage(Request $request, User $user)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();   
    $request->image->storeAs('public/images', $imageName);

    $user->update(['image' => $imageName]);

    return back()->with('success', 'You have successfully upload image.');
}
/**
 * Remove the specified resource from storage.
 */


}