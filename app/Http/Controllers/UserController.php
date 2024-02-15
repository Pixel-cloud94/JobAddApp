<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {   
        if (!Auth::user()->isAdmin) {
            $request->validate([
                'username' => 'required|unique:users',
                'password' => 'required'
            ]);
        }
        else
        {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        }
        
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
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

/**
 * Remove the specified resource from storage.
 */
public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}