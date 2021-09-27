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
        $dates = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
        
        $deflt_date  = config('constants.attn_default_date'); 
        
        $todays_date = date("y/m/d");

        $attendence = DB::table('attendence')->where('date',$dates)->get();
        
         //dd($attendence);
         //dd($attendence[0]->status);
        

        return view('layouts.employees.attendence',compact('employees','desig','des','yesterday','attendence'));
    }



    public function attendenceAjax(){ 
        $da = $_REQUEST['dates'];
        $emp_id = $_REQUEST['emp_id'];
        $st = $_REQUEST['statusOfAtteendence'];
     
        DB::table('attendence')->insert(
            array(
                   'employee_id'     =>  $emp_id, 
                   'status'   =>  $st,
                   'date'   =>  $da,
                  
            )
       );
        
          $attend_id = DB::table('attendence')->where('employee_id',$emp_id)->where('date',$da)->select('id')->first();

        $value = "";
        if($st != 0){
           
            $in_out = $_REQUEST['in_out'];

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
    }else{
        DB::table('in_outs')->insert(
            array(
                   'attendence_id'     =>  $attend_id->id, 
                   'punch_in'   =>  0,
                   'punch_out'   =>  0,
                  
            )
       );
    }
      // return $value . "\t" . $emp_id;
      return "success";

    }

    public function viewattendence(){
        $employees = DB::table('users')->get();
return view('layouts.employees.view-attendence',compact('employees'));
    }


    public function viewattendenceajax(){

        $id = $_REQUEST['id'];
        $sel = $_REQUEST['sel_date'];
        $emp_det = "";
        
      
      
        $emp_det = DB::table('attendence')->where('employee_id',$id)
        ->join('in_outs','in_outs.attendence_id','=','attendence.id')
        ->join('users','attendence.employee_id','=','users.id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('in_outs.*','attendence.date', 'users.first_name','users.last_name','in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name')
        ->get();

        if(empty($emp_det)){
          
              $emp_det = DB::table('users')->where('id',$id)->select('first_name','last_name')->get();
          }else{

            if($sel == 1){
                $emp_det = DB::table('attendence')->whereMonth('date', date('m'))->where('employee_id',$id)
                ->join('in_outs','in_outs.attendence_id','=','attendence.id')
                ->join('users','attendence.employee_id','=','users.id')
                ->join('designations', 'designations.id', '=', 'users.designation_id')
                ->select('in_outs.*','attendence.date','users.first_name','users.last_name', 'in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name')
                ->get();
            }elseif($sel == 2){
                $emp_det = DB::table('attendence')->whereMonth('date', date('m')-1)->where('employee_id',$id)
                ->join('in_outs','in_outs.attendence_id','=','attendence.id')
                ->join('users','attendence.employee_id','=','users.id')
                ->join('designations', 'designations.id', '=', 'users.designation_id')
                ->select('in_outs.*','attendence.date','users.first_name','users.last_name', 'in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name')
                ->get();
            }

     }
    
        return  $emp_det;
        // return  $sel_date;
    }

    public function filterattendenceajax(){
        $sel = $_REQUEST['sel_date'];
        $id = $_REQUEST['id'];

       
        if($sel == 1){
            $date = DB::table('attendence')->whereMonth('date', date('m'))->where('employee_id',$id)
            ->join('in_outs','in_outs.attendence_id','=','attendence.id')
            ->join('users','attendence.employee_id','=','users.id')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->select('in_outs.*','attendence.*','designations.designation_name')
            ->get();
        }elseif($sel == 2){
            $date = DB::table('attendence')->whereMonth('date', date('m')-1)->where('employee_id',$id)
            ->join('in_outs','in_outs.attendence_id','=','attendence.id')
            ->join('users','attendence.employee_id','=','users.id')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->select('in_outs.*','attendence.*','designations.designation_name')
            ->get();
        }

   
        return  $date;
    }


    public function manualdatefilterajax(){
        $manualfrom = $_REQUEST['fromval'];
        $manualto = $_REQUEST['toval'];
        $id = $_REQUEST['id'];


        $manualdate = DB::table('attendence')->whereBetween('date', [$manualfrom,$manualto])->where('employee_id',$id)
        ->join('in_outs','in_outs.attendence_id','=','attendence.id')
        ->join('users','attendence.employee_id','=','users.id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('in_outs.*','attendence.*','designations.designation_name')
        ->get();
   // 
        return $manualdate;
    }



    
}
