<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Setting;
use App\Models\Allowance;

class UsageCalculator extends Component
{
    public function render()
    {   
        $user_id = auth()->user()->id;
        $setting=Setting::first();
        $brands=Brand::where('user_id', $user_id)->get();
        $allowances = Allowance::where('user_id', $user_id)->orderBy('spend', 'asc')->get();
        
        //retrieve active brands
        $active_brands = Brand::where('status', 'Active')->get();

        //calculate equivalent price
        $equivalent_price = 0;
        foreach($active_brands as $brand){
            $equivalent_price += $brand->price;
        }

        //find all allowances that give equivalent spend
        $possible_bands = [];
        foreach($allowances as $allowance){
            if($allowance->equivalent > $equivalent_price){
                $possible_bands[]= $allowance->equivalent;
            }
        }
        //find the lowest equivalent spend
        if(empty($possible_bands)){
            $tier = [];
            $tier['spend'] = 999999;
            $tier['equivalent'] = 999999;
        }else{
       $lowest_equivalent = min($possible_bands);
        
       //get allowance object with the lowest min spend
       $tier = Allowance::where('equivalent', $lowest_equivalent)->first();
        }
        return view('livewire.usage-calculator', compact('brands', 'equivalent_price', 'tier', 'allowances'));
    }

    public function updateBrandStatus($id){
        $brand= Brand::where('id', $id)->first();
       
        if($brand->status == 'Inactive'){
            $brand->status = 'Active';
            $brand->update();
        }else{
            $brand->status = 'Inactive';
            $brand->update();
        }

        

        $allowance = 500;
        $active_brands = Brand::where('status', 'Active')->get();
        $units_used = 0;
        foreach($active_brands as $brand){
            $units_used += $brand->units;
        }
        return back();
    }

 
}
