<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mail;

class LeaveController extends Controller
{

    public function approverejectAjax()
    {
         $id = $_POST['id'];
         $st = $_POST['status'];
         $rj = $_POST['reject_res'];
         $em_id = $_POST['emp_id'];
         $role = "";       
        $approved_by = Auth::user()->role;       

        if( $approved_by == '0' ){
        $role='Admin';
        }else{
        $role='Hr';
        }
        // $approved_by_last_name = Auth::user()->first_name;

        // dd($approved_by);
         if($rj == ""){
            if($st == 2){
                $leaves = Leave::find($id);
                $leaves->status = 2;
                $leaves->approved_by = $role;
                $leaves->save();
                $user = User::find($em_id);
                $this->rejectleaveapplyemail($rj,$user->official_email_address,$leaves->approved_by);
                return "rejected";
             }else{
               $leaves = Leave::find($id); 
               $leaves->status = 1;  
               $leaves->approved_by = $role;             
               $leaves->save();
               $user = User::find($em_id);
               $this->approvedleaveapplyemail('Approved',$user->official_email_address,$leaves->approved_by);
                return "approved";
             }
         }else{
            if($st == 2){
                $leaves = Leave::find($id);
                $leaves->status = 2;
                $leaves->reject_reason = $rj;
                $leaves->approved_by = $role; 
                $leaves->save();
                $user = User::find($em_id);
                $this->rejectleaveapplyemail($rj,$user->official_email_address,$leaves->approved_by);
                return "rejected";
             }else{
               $leaves = Leave::find($id); 
               $leaves->status = 1;
               $leaves->approved_by = $role; 
               $leaves->save();
               $user = User::find($em_id);
               $this->approvedleaveapplyemail('Approved',$user->official_email_address,$leaves->approved_by);
                return "approved";
             }
         }
        

         
        
    }

    public function editleave($id)
    {
        // $empleaves = DB::table('leaves')->where('emp_id',Auth::user()->id)->get();
        $leaves = Leave::find($id);
        // $leaves = DB::table('leaves')->get();
        return view('layouts.employees.edit-leave', compact('leaves'));
    }

    public function updateLeave(Request $request, $id )
    {
        $request->validate([
      
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d|after_or_equal:from_date',
            'reason' => 'required',
             ]);
         $leave = Leave::find($id);
         $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->reason = $request->reason;

        $fdate = $request->from_date;
        $tdate = $request->to_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $leave->number_of_days	 = $days +1;

        $leave->save();
        // $leave->emp_id =Auth::user()->id ;
        $this->updateleaveapplyemail( $leave->reason,  $leave->from_date,  $leave->to_date ,  $leave->number_of_days);
        return redirect(route('leave_listing'))->with('status', 'Leave Updated Successfully ');
    }

    public function applyleaves()
    {
        $leave = DB::table('leaves')->get();
        return view('layouts.employees.apply-leaves', compact('leave'));
    }

    // public function leaveemployeeDetails(){
    //     $user = auth()->user();
    //     $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
    //     // $designation = DB::table('designations)->where('id', $user->designation_id)->select('designation_name')->get()->first();
    //     return view('layouts.employees.leavemail', compact('department'));
    // }


    public function storeapplyleaves(Request $request)
    {

        $request->validate([
      
       'from_date' => 'required|date_format:Y-m-d',
       'to_date' => 'required|date_format:Y-m-d|after_or_equal:from_date',
       'reason' => 'required',
    //    'no_of_days' => 'required'
        ]);
        
        $leave = new Leave;
      
        $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->reason = $request->reason;

        $fdate = $request->from_date;
        $tdate = $request->to_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $leave->number_of_days	 = $days + 1;

        $leave->emp_id =Auth::user()->id ;
        $leave->save();
        $this->leaveapplyemail( $leave->reason,  $leave->from_date,  $leave->to_date ,  $leave->number_of_days);
        return redirect(route('apply_leaves'))->with('status', ' Leave Applied Successfully ');
     
    }
    public function myleaves()
    {
        $empleaves = DB::table('leaves')->where('emp_id',Auth::user()->id)->get();
        return view('layouts.employees.my-leaves',compact('empleaves'));
    }
    public function leaveslisting()
    {
        $empleaves = DB::table('leaves')->get();
        return view('layouts.employees.leave-listing',compact('empleaves'));
    }

    public function deleteleave($id)
    {
        DB::table('leaves')->where('id', $id)->delete();
        return redirect(route('my_leaves'))->with('status', ' Leave Deleted Successfully');
    }


    public function leaveapplyemail($reason, $from, $todate ,$no_of_days)
    {
        $user = auth()->user();
        // dd($user);
        $email['to'] = "trigvent@gmail.com";
        $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
        $data = ['reason' => $reason, 'from' =>new DateTime($from), 'todate' => new DateTime($todate) , 'no_of_days' => $no_of_days , 'department'=>$department];
        Mail::send('layouts.employees.leavemail',  $data, function ($message) use ($email) {
            $message->from('trigventintranet@gmail.com', 'Trigvent');
            $message->subject('Leave Request');
            $message->to($email['to']);
            $message->cc(['hr@trigvent.com']);
        });
        // return view('layouts.employees.leavemail', compact('data'));
    }
    public function updateleaveapplyemail($reason, $from, $todate ,$no_of_days)
    {
        $user = auth()->user();
        $email['to'] = "trigvent@gmail.com";
        $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
        $data = ['reason' => $reason, 'from' => $from, 'todate' => $todate , 'no_of_days' => $no_of_days , 'department'=>$department];
        Mail::send('layouts.employees.leavemail',  $data, function ($message) use ($email) {
            $message->from('trigventintranet@gmail.com', 'Trigvent');
            $message->subject('Leave Request Update');
            $message->to($email['to']);
            $message->cc(['hr@trigvent.com']);
        });
    }
    public function rejectleaveapplyemail($rjreason,$mail,$rejected_by)
    {
        $user = auth()->user();
        $email['to'] = $mail;
        // $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
        $data = ['rjreason' => $rjreason,'rejected_by'=>$rejected_by];
        Mail::send('layouts.employees.reject-mail',$data, function ($message) use ($email) {
            $message->from('trigventintranet@gmail.com', 'Trigvent');
            $message->subject('Leave Rejected');
            $message->to($email['to']);
            $message->cc(['trigvent@gmail.com','hr@trigvent.com']);
        });
    }

    public function approvedleaveapplyemail($rjreason,$mail,$approved_by)
    {
        $user = auth()->user();
        $email['to'] = $mail;
        // $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
        $data = ['rjreason' => $rjreason,'approved_by'=>$approved_by];
        Mail::send('layouts.employees.approve-mail',$data, function ($message) use ($email) {
            $message->from('trigventintranet@gmail.com', 'Trigvent');
            $message->subject('Leave Approved');
            $message->to($email['to']);
            $message->cc(['trigvent@gmail.com','hr@trigvent.com']);
        });
    }
}
