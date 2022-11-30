<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allowance;
use App\Models\Setting;

class SettingsController extends Controller
{   

    public function settings(){
        return view('settings');
    }
   
    

    public function setPrices(){
        $attributes = request()->validate([
            'unit_price'=>['required', 'numeric'],
            'min_price'=>['required', 'numeric'],
            'att_adj'=>['required', 'numeric'],
            'language_adj'=>['required', 'numeric'],
            
        ]);

        Setting::first()->update($attributes);

        return back();
    }
}
