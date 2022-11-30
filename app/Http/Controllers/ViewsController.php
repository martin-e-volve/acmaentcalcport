<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Setting;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
   public function home(){
      if(auth()->user()){
         if(auth()->user()->accountType == 'admin'){
            $users = User::get();
            $settings = Setting::first();
           
         return view('admin', compact('users', 'settings'));
         }
         elseif(auth()->user()->accountType == 'enterprise'){
            $settings = Setting::first();
            $user_id = auth()->user()->id;
         return view('dashboard', compact('settings', 'user_id'));
      }
      }else{
    return view('register/login');
   }
}
}