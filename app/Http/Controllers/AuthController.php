<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    function login(){
        return view ('login');
    }

    function register(){
        return view ('register');
    }

    function loginPost(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request ->only('email','password');
        if(Auth::attempt($credentials)){
             $user = Auth::user(); 
                if ($user->isAdmin) {
                    return redirect()->route('adminboard');
                } else {
                    return redirect()->route('userboard');
                }
        }
        return redirect(route('login'))->with("error", "Login Details not valid");

    }
    function registerPost(Request $request){

        if ($request->has('from_admin')) {
        
         $request-> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required',
            'isAdmin' => 'required|boolean',

        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['username'] =$request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $data['image'] = $filename;
        }
        $data['isAdmin'] = $request->isAdmin;

        $user = User::create($data);
        
        if (!$user) {
            return redirect(route('adminboard'))->with("error", "Registration failed, try again!");
        }
        else{
            return redirect(route('adminboard'))->with("success", "User added successfully. Log in!");
        }    

        
        } else {

            $request-> validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required|unique:user',
                'email' => 'required|email|unique:user',
                'password' => 'required',
                
    
            ]);
    
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['username'] =$request->username;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            if (!$user) {
                return redirect(route('register'))->with("error", "Registration failed, try again!");
            }
            else{
                return redirect(route('login'))->with("success", "Registration successful! Log in!");
            }    
    
            
            
        }

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
