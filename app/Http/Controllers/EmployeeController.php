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
use Mail;


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
     public function ajaxCall(){
        
      
         $st_code = $_REQUEST['state_code'];
        
         $allCity = DB::table('all_cities')->where('state_code',$st_code)->get();
         return $allCity;

    }
    public function designationAjax(){
        $dept_id = $_REQUEST['dept_id'];
        $allDes = DB::table('designations')->where('department', $dept_id)->get();
        return $allDes;
    }

    

    public function add()
    {
        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
         $allState = DB::table('all_states')->select('state_name','state_code')->get();
        
        return view('layouts.employees.add-employee', compact('departments', 'designations','allState'));
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
			'bank_name' => 'max:100',
            'bank_account_number' => 'max:30',
            'department' => 'required',
            'designation' => 'required',
            'joining_date' => 'required',
            // 'password' => 'required',
            'image' => 'mimes:png,jpeg,jpg,gif,svg',

        ]);

         $pass = randomPassword();

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

        // $user->city = $request->city;
        // $user->state = $request->state;

        $user->city = $request->selectcity;   // edit in selection
        $user->state = $request->selectstate;

        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->joining_date = $request->joining_date;
        $user->password = Hash::make($pass);
        $user->bank_account_name = $request->bank_account_name;
		$user->bank_name = $request->bank_name;
        $user->bank_account_number = $request->bank_account_number;
        $user->bank_ifsc_code = $request->bank_ifsc_code;
        $user->notes = $notes;
        $user->employee_code = $emplpyee_code + 1;

        if ($count_username > 0) {
            $user->username = strtolower($username[0] . $lastname[0]);
        } else {
            $user->username = strtolower($username[0]);
        }
		  $this->email( $user->personal_email_address, $user->username,$pass,  $user->first_name);
        $user->save();

      //  return redirect(route('addEmployee'))->with('status', 'Employee Added Successfully');
         return redirect(route('addEmployee'))->with('status', 'Employee Added Successfully. ( Hello, '. $user->first_name.'  Your Username : '. $user->username.',   Password : '.$pass.' )');

    }
	
	//confirmation mail
	public function email($mail , $uname , $upass , $fname)
    {
        $email['to'] = $mail;
        $data=['uname'=>$uname ,'upass'=>$upass,'fname'=>$fname];
        Mail::send('layouts.employees.mail',  $data,function ($message) use ($email) {
            $message->from('trigventintranet@gmail.com', 'Trigvent');
            $message->subject('Welcome to trigvent family');
            $message->to($email['to']);
        });
        
    
    }

    public function listing()
    {
        $user = auth()->user();
        if($user->role == 0){
            $employees = DB::table('users')
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('users.*', 'departments.department_name', 'designations.designation_name')
            ->get();

        }else{
            $employees = DB::table('users')->where('role',2)
            ->join('designations', 'designations.id', '=', 'users.designation_id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('users.*', 'departments.department_name', 'designations.designation_name')
            ->get();
        }
       

           
        return view('layouts.employees.employees-listing', compact('employees'));
    }

    public function edit($id)
    {
        
     

        $user = auth()->user();
        if($user->role == 0){
            $employee = User::find($id);
        }else{
            $employee = DB::table('users')->where('id',$id)->where('role',2)->get();   // ->whereIn('id', [1, 2, 3])
            $employee =  $employee[0];
        }
       

        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        $allState = DB::table('all_states')->get();
        $city = DB::table('all_cities')->get();

        return view('layouts.employees.edit-employee', compact('departments', 'designations', 'employee','allState','city'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'personal_email_address' => 'required',
            'mobile_number' => 'required|max:15',
			 'alternate_number' => 'max:15',
            'bank_ifsc_code' => 'max:15',
            'bank_name' => 'max:100',
            'bank_account_number' => 'max:30',
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
       // $user->city = $request->city;
       // $user->state = $request->state;
	    $user->city = $request->selectcity2;  
        $user->state = $request->selectstate2;

        $emplpyee_code = User::max('employee_code');
        if ($emplpyee_code == null) {
            $emplpyee_code = 1000;
        }
	   
        $user->employee_code = $emplpyee_code + 1;

        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->joining_date = $request->joining_date;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->bank_account_name = $request->bank_account_name;
		$user->bank_name = $request->bank_name;
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
      
        $get_state = DB::table('all_states')->where('id', $user->state)->select('state_name')->first();
        $get_city = DB::table('all_cities')->where('id', $user->city)->select('city_name')->first();
        
       // dd($get_city);
       
        return view('layouts.employees.employee-details', compact('department' ,'designation','get_state','get_city'));
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
              return redirect(route('changePassword'))->with('error', ' Password is Incorrect ! ');
        }
    
      }

}

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789#@!";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


