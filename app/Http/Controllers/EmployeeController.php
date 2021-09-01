<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        // if(Gate::none(['isAdmin','isHr'])){
        //     abort(404);
        // }
        return view('layouts.employees.add-employee', compact('departments', 'designations'));
    }


    public function store(Request $request) 
    {
        $request->validate([
            'first_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'personal_email_address' => 'required|email|unique:users',
            'mobile_number' => 'required|max:15',
            'alternate_number' => 'max:15',
            'bank_ifsc_code' => 'max:15',
            'bank_account_number' => 'max:30',
            'department' => 'required',
            'designation' => 'required',
            'joining_date' => 'required',
            'password' => 'required',
            'image' => 'mimes:png,jpeg,jpg,gif,svg',

        ]);

        $notes = [];
        foreach ($request->notes as  $note) {
            if ($note != '') {
                $notes[] = $note;
            }
        }
        $notes = json_encode($notes);

        $emplpyee_code = User::max('employee_code');
        if ($emplpyee_code == null) {
            $emplpyee_code = 1000;
        }


        $personal_email_address = $request->personal_email_address;

        $username = [];
        $uname = explode('@',  $personal_email_address);
        $username = $uname;

        $lastname = [];
        $lname = explode('.',  $username[1]);
        $lastname = $lname;


        $count_username = DB::table('users')->where("username", $username[0])->count();

        $user = new User;
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . "." . $extension;
            $destination_path = public_path('/employee-images/');
            $request->file('image')->move($destination_path, $image_name);
            $user->image = $image_name;
        }


        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->personal_email_address = $request->personal_email_address;
        $user->official_email_address = $request->official_email_address;
        $user->mobile_no = $request->mobile_number;
        $user->alternate_no = $request->alternate_number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->joining_date = $request->joining_date;
        $user->password = Hash::make($request->password);
        $user->bank_account_name = $request->bank_account_name;
        $user->bank_account_number = $request->bank_account_number;
        $user->bank_ifsc_code = $request->bank_ifsc_code;
        $user->notes = $notes;
        $user->employee_code = $emplpyee_code + 1;

        if ($count_username > 0) {
            $user->username = strtolower($username[0] . $lastname[0]);
        } else {
            $user->username = strtolower($username[0]);
        }
        $user->save();

        return redirect(route('addEmployee'))->with('status', 'Employee Added Successfully');

    }

    public function listing()
    {
        $employees = DB::table('users')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('users.*', 'departments.department_name', 'designations.designation_name')
            ->get();
        return view('layouts.employees.employees-listing', compact('employees'));
    }

    public function edit($id)
    {
        $employee = User::find($id);
        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        // if(Gate::none(['isAdmin','isHr'])){
        //     abort(404);
        // }
        return view('layouts.employees.edit-employee', compact('departments', 'designations', 'employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'personal_email_address' => 'required',
            'mobile_number' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'joining_date' => 'required',
            'image' => 'mimes:png,jpeg,jpg,gif,svg',

        ]);
        $user = User::find($id);
        if ($request->file('image')) {
            // $image_name =$request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . "." . $extension;
            $destination_path = public_path('/employee-images/');
            $request->file('image')->move($destination_path, $image_name);
            $user->image = $image_name;
        }

        $notes = [];
        if ($request->has("notes")) {
            foreach ($request->notes as $note) {
                if ($note == null) {
                    continue;
                } else {
                    $notes[] = $note;
                }
            }
        }

        $notes = json_encode($notes);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->personal_email_address = $request->personal_email_address;
        $user->official_email_address = $request->official_email_address;
        $user->mobile_no = $request->mobile_number;
        $user->alternate_no = $request->alternate_number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->employee_code = $request->employee_id;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->joining_date = $request->joining_date;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->bank_account_name = $request->bank_account_name;
        $user->bank_account_number = $request->bank_account_number;
        $user->bank_ifsc_code = $request->bank_ifsc_code;
        $user->notes = $notes;
        $user->save();
        return redirect(route('employeesListing'))->with('status', 'Employee Updated Successfully ');
    }


    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect(route('employeesListing'))->with('status', ' User Deleted Successfully');
    }


    public function employeeDetails(){
        
       
        $user = auth()->user();
        $department = DB::table('departments')->where('id', $user->department_id)->select('department_name')->get()->first();
        $designation = DB::table('designations')->where('id', $user->designation_id)->select('designation_name')->get()->first();
        return view('layouts.employees.employee-details', compact('department' ,'designation'));
      }

      public function viewPassword(Request $req){
     
        return view('layouts.employees.change-password');
      }
      public function changePassword(Request $request){
    
        $hashedPassword = auth()->user()->password;
        $username = auth()->user()->username;
    
    
        if(Hash::check($request->currentpasssword,$hashedPassword)){
            // echo "Password matched";
            if($request->newpassword == $request->confirmpassword){
                  
                 $hashpassword = Hash::make($request->newpassword);
                   
                    $user = DB::table('users')->where('username',$username)->update([
                    'password' => $hashpassword
                    ]);
                   
                    return redirect(route('changePassword'))->with('status', 'Password Changed Successfully ');
             }else{
                 // dd( "Your  new pass & confrim  Password is not matched");
                 return redirect(route('changePassword'))->with('error', 'New Password & Confirm Password Are not Matched ! ');
             }
        }else{
              // dd("Current Password is Correct");
              return redirect(route('changePassword'))->with('error', 'Current Password is Incorrect ! ');
        }
    
      }

}


