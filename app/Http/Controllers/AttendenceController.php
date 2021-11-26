<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
// <<<<<<< jitender
//     }

//     public function attendenceAjax(){ 
//         $da = $_REQUEST['dates'];
//         $emp_id = $_REQUEST['emp_id'];
//         $st = $_REQUEST['statusOfAtteendence'];
      
 
//        // $data = DB::table('attendence')->where('date',$da)->select('employee_id')->get();

         
//         //  foreach ($data as $key => $value) {
             
//         //  }

//         DB::table('attendence')->insert(
//             array(
//                    'employee_id'     =>  $emp_id, 
//                    'status'   =>  $st,
//                    'date'   =>  $da,
                  
//             )
//        );
        
//           $attend_id = DB::table('attendence')->where('employee_id',$emp_id)->where('date',$da)->select('id')->first();

//         $value = "";
//         if($st != 0){
           
//             $in_out = $_REQUEST['in_out'];

//         if(count($in_out)>0){
//             for($i = 0; $i < count($in_out[0]); $i++){            
//                //  $value .= " IN Time: " . $in_out[0][$i] . ' Out Time: ' . $in_out[1][$i];
//                  DB::table('in_outs')->insert(
//                                 array(
//                                        'attendence_id'     =>  $attend_id->id, 
//                                        'punch_in'   =>  $in_out[0][$i],
//                                        'punch_out'   =>  $in_out[1][$i],
                                      
//                                 )
//                            );
//             }
//         }
//     }else{
//         DB::table('in_outs')->insert(
//             array(
//                    'attendence_id'     =>  $attend_id->id, 
//                    'punch_in'   =>  0,
//                    'punch_out'   =>  0,
                  
//             )
//        );
//     }
//       // return $value . "\t" . $emp_id;
//       return $data;

// =======
// >>>>>>> main
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


    
    public function viewemployeeattendence(){
        
        $employees = DB::table('attendence')->where('employee_id',Auth::user()->id)
        ->join('in_outs','in_outs.attendence_id','=','attendence.id')
        ->join('users','attendence.employee_id','=','users.id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('in_outs.*','attendence.date', 'users.first_name','users.last_name','in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
        ->get();
        return view('layouts.employees.view-attendence-employee',compact('employees'));
    }


    public function viewattendenceajax(){  

        $id = $_REQUEST['id'];
        $sel = $_REQUEST['sel_date'];
        $emp_det = "";
        
         
    
      
        $emp_det = DB::table('attendence')->where('employee_id',$id)
        ->join('in_outs','in_outs.attendence_id','=','attendence.id')
        ->join('users','attendence.employee_id','=','users.id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('in_outs.*','attendence.date', 'users.first_name','users.last_name','in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
        ->get();

        if(count($emp_det) == 0){
              $emp_det = [];
              $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();

              $emp_det[0] = $all_det2;
              $emp_det[1] =  1;

          }else{

            if($sel == 1){
                $emp_det = DB::table('attendence')->whereMonth('date', date('m'))->where('employee_id',$id)
                ->join('in_outs','in_outs.attendence_id','=','attendence.id')
                ->join('users','attendence.employee_id','=','users.id')
                ->join('designations', 'designations.id', '=', 'users.designation_id')
                ->select('in_outs.*','attendence.date','users.first_name','users.last_name', 'in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
                ->get();

                if(count($emp_det) == 0){
                    $emp_det = [];
                    $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();
      
                    $emp_det[0] = $all_det2;
                    $emp_det[1] =  1;
                }


            }elseif($sel == 2){
                $emp_det = DB::table('attendence')->whereMonth('date', date('m')-1)->where('employee_id',$id)
                ->join('in_outs','in_outs.attendence_id','=','attendence.id')
                ->join('users','attendence.employee_id','=','users.id')
                ->join('designations', 'designations.id', '=', 'users.designation_id')
                ->select('in_outs.*','attendence.date','users.first_name','users.last_name', 'in_outs.punch_in','in_outs.punch_out','attendence.status','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
                ->get();

                if(count($emp_det) == 0){
                    $emp_det = [];
                    $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();
      
                    $emp_det[0] = $all_det2;
                    $emp_det[1] =  1;
                }
            }

     }
    
        return  $emp_det ;
        // return  $sel_date;
    }

    public function filterattendenceajax(){
        $sel = $_REQUEST['sel_date'];
        $id = $_REQUEST['id'];
       // $date = '';
       
        if($sel == 1){
            $date = DB::table('attendence')->whereMonth('date', date('m'))->where('employee_id',$id)
            ->join('in_outs','in_outs.attendence_id','=','attendence.id')
            ->join('users','attendence.employee_id','=','users.id')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->select('in_outs.*','attendence.*','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
            ->get();

            if(count($date) == 0){
                $date = [];
                $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();
  
                $date[0] = $all_det2;
                $date[1] =  1;
            }

        }elseif($sel == 2){
            $date = DB::table('attendence')->whereMonth('date', date('m')-1)->where('employee_id',$id)
            ->join('in_outs','in_outs.attendence_id','=','attendence.id')
            ->join('users','attendence.employee_id','=','users.id')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->select('in_outs.*','attendence.*','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
            ->get();

             
            if(count($date) == 0){
                $date = [];
                $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();
  
                $date[0] = $all_det2;
                $date[1] =  1;
            }

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
        ->select('in_outs.*','attendence.*','designations.designation_name','users.current_year_accrued_leaves','users.last_year_accrued_leaves')
        ->get();

        if(count($manualdate) == 0){
            $manualdate = [];
            $all_det2 = DB::table('users')->where('id',$id)->select('first_name','last_name','current_year_accrued_leaves','last_year_accrued_leaves')->get();

            $manualdate[0] = $all_det2;
            $manualdate[1] =  1;
        }

   // 
        return $manualdate;
    }



    
}
