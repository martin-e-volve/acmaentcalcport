<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Setting;

class BrandsController extends Controller
{
    public function dashboard(){
        
       
        return view('dashboard');
    }

    public function add_brand(Request $request){
        $settings = Setting::first();
        $brand= new Brand;
        $brand->brandname = $request->brandname;
        $brand->url = $request->url;
        $brand->status = $request->status;
        $brand->impressions = $request->impressions;
        $brand->products = $request->products;
        $brand->languages = $request->languages;
        $brand->attributes = $request->product_att;
        $brand->user_id = $request->user_id;
       
        //work out units required
        $product_units = round($request->products/100);
        $traffic_units = round($request->impressions/50000);
        $att_units = 0;
        $language_units = 0;
        
        //add units for additional attributes
        if($request->product_att > 10){
            $extra_att = $request->product_att - 10;
            $unit_mark_up = ($settings->att_adj/100) * $extra_att;
            $att_units = $product_units* $unit_mark_up;
        }
        //add units for additional language sites
        if($request->languages != 0){
            $language_mark_up = $product_units * ($settings->language_adj/100);
            $language_units = round($request->languages * $language_mark_up);
        }

        //add all the units together
        $total_units = $product_units + $att_units + $language_units + $traffic_units;
        $brand->units = $total_units;
        
        
        //calculate price
        $subtotal=0;
        if($total_units<=50){
            $subtotal = $total_units*50;
        }else{
            $add_units = ($total_units - 50);
            $subtotal = ($add_units*$settings->unit_price) + 2500;
        }

        $brand->price = max($subtotal, $settings->min_price);
        $brand->save();

        
        return back();
    }

    public function deleteBrand($id){
        $brand = Brand::where('id', $id)->first();
        $brand->delete();

        return back();
    }
}
