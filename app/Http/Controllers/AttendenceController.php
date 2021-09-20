<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    public function attendence(){
        $employees = User::where('status', 1)->get();
        // $dept = DB::table('departments')->get();
        // $count = $dept->count();
        $desig = DB::table('designations')->get();
        $des = $desig->count();


        $yesterday = date("m-d-Y", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
        
        $deflt_date  = config('constants.attn_default_date'); 
        
        $todays_date = date("y/m/d");

        
        

        return view('layouts.employees.attendence',compact('employees','desig','des','yesterday'));
    }

    public function viewattendence(){

return view('layouts.employees.view-attendence');
    }

    
}
