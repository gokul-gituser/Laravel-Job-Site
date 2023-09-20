<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
     //register form
     public function create(){
        return view('users.register');
    }

    //create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required' , 'email' ,Rule::unique('users','email') ],
            'password' => 'required|confirmed|min:6'

        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);
        //login
        auth()->login($user);

        return redirect('/')->with('message','Account Created and Logged in');

    
    }
    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged Out');

    }

    //show login form
    public function login(){
        return view('users.login');
    }

    //authenticate for login
    public function authenticate(Request $request){
        $formFields = $request->validate([
           
            'email' => ['required' , 'email'],
            'password' => 'required'
        ]);
        
        //attempt to login with the above info
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You Are Logged In');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');


    }
}

