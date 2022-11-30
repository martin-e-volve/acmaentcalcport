<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allowance;
use App\Models\User;

class AllowancesController extends Controller
{
    public function allowance($id){
        $allowances = Allowance::where('user_id', $id)->orderBy('spend', 'asc')->get();
        $user = User::where('id', $id)->first();
        return view('allowance', compact('allowances', 'user'));
    }

    public function addAllowance(Request $request){

        $attributes = request()->validate([
            'user_id'=>['required', 'max:255'],
            'discount_rate'=>['required', 'numeric'],
            'spend'=>['required', 'numeric'],
        ]);
        //create new record for spend without further values
       
        Allowance::create($attributes);

        //get all records and order by spend

        $allowances = Allowance::where('user_id', $request->user_id)->orderBy('spend', 'asc')->get();
        //foreach loop to recalculate each record
         
        foreach($allowances as $allowance){
            //get previous spends to calculate the new increment
            $previous_increments = Allowance::where('user_id', $attributes['user_id'])->where('spend','<', $allowance->spend)->sum('increment');
            $increment = $allowance->spend - $previous_increments;
            $allowance->increment = $increment;
            $allowance->pre_discount_tier = $increment * (1+($allowance->discount_rate/100));

            $previous_allowances = Allowance::where('user_id', $attributes['user_id'])->where('spend', '<', $allowance->spend)->sum('allowance');
            $new_allowance = $increment * ($allowance->discount_rate/100);
            $allowance->allowance = $new_allowance;

            $allowance->equivalent = $previous_allowances + $new_allowance + $allowance->spend;

            $allowance->annual_saving = ($allowance->equivalent * 12) - ($allowance->spend* 12);

            $allowance->update();
        }
       
        return back();
    }

    public function deleteAllowance($id, $user_id){
            $delete_allowance = Allowance::where('id',$id)->first();
            $delete_allowance->delete();

            $allowances = Allowance::where('user_id', $user_id)->orderBy('spend', 'asc')->get();
            //foreach loop to recalculate each record
             
            foreach($allowances as $allowance){
                //get previous spends to calculate the new increment
                $previous_increments = Allowance::where('user_id', $user_id)->where('spend','<', $allowance->spend)->sum('increment');
                $increment = $allowance->spend - $previous_increments;
                $allowance->increment = $increment;
                $allowance->pre_discount_tier = $increment * (1+($allowance->discount_rate/100));
    
                $previous_allowances = Allowance::where('user_id', $user_id)->where('spend', '<', $allowance->spend)->sum('allowance');
                $new_allowance = $increment * ($allowance->discount_rate/100);
                $allowance->allowance = $new_allowance;
    
                $allowance->equivalent = $previous_allowances + $new_allowance + $allowance->spend;
    
                $allowance->annual_saving = ($allowance->equivalent * 12) - ($allowance->spend* 12);
    
                $allowance->update();
            }
           
            return back();
    }
}
