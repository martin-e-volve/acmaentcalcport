<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    
    public function store(){
        //regisater new user
      $attributes = request()->validate([
            'name'=>['required','max:255', 'min:5', Rule::unique('users', 'name')],
            'email'=>['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'accountType'=>['required','max:255'],
            'password'=>['required','max:255', 'min:8'],
            'first_name'=>['max:255'],
            'last_name'=>['max:255'],
            'company_name'=>['max:255'],


        ]);
       
       User::create($attributes);

        session()->flash('success', 'Account has been created');

        return back();
    }

    public function login(){
        return view('register/login');
    }

    public function session(){
        //login
        $attributes = request()->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/');
        }

        return back()->withInput()->withErrors([

            'email'=>'Your email could not be verified. Please try again or contact Advanced Commerce for support',
            'password'=>'Your password could not be verified. Please try again or contact Advanced Commerce for support'
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect('login');
    }
}
