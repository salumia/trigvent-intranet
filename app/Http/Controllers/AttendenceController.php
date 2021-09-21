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



    public function attendenceAjax(){ 
        $da = $_REQUEST['dates'];
        $emp_id = $_REQUEST['emp_id'];
        $st = $_REQUEST['statusOfAtteendence'];
        $in_out = $_REQUEST['in_out'];
       // $out = $_REQUEST['out_time'];
 
  

        DB::table('attendence')->insert(
            array(
                   'employee_id'     =>  $emp_id, 
                   'status'   =>  $st,
                   'date'   =>  $da,
                  
            )
       );
        
          $attend_id = DB::table('attendence')->where('employee_id',$emp_id)->where('date',$da)->select('id')->first();

        $value = "";
        if(count($in_out)>0){
            for($i = 0; $i < count($in_out[0]); $i++){            
               //  $value .= " IN Time: " . $in_out[0][$i] . ' Out Time: ' . $in_out[1][$i];
                 DB::table('in_outs')->insert(
                                array(
                                       'attendence_id'     =>  $attend_id->id, 
                                       'punch_in'   =>  $in_out[0][$i],
                                       'punch_out'   =>  $in_out[1][$i],
                                      
                                )
                           );
            }
        }
      // return $value . "\t" . $emp_id;
      return $attend_id;

    }

    public function viewattendence(){
        $employees = DB::table('users')->select('first_name','last_name','id')->get();
return view('layouts.employees.view-attendence',compact('employees'));
    }


    public function viewattendenceajax(){

        $id = $_REQUEST['id'];
        
         $emp_det = DB::table('attendence')->where('employee_id',$id)
        ->join('in_outs','in_outs.attendence_id','=','attendence.id')
        ->join('users','attendence.employee_id','=','users.id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('in_outs.*','attendence.date', 'in_outs.punch_in','in_outs.punch_out','users.first_name','users.last_name','attendence.status','designations.designation_name')
        ->get();
     
        return  $emp_det;
    }

    
}
