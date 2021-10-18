<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('layouts.dashboard.index');
       
    }
    public function landing_page()
    {
         $data =  DB::table('users')
        ->join('designations','designations.id','=','users.designation_id')
        ->select('users.id','users.first_name','users.last_name','users.official_email_address','designations.designation_name','users.image','users.gender','users.skype_id')
        ->get();  
     

       return view('employee_directory',compact('data'));
       
    }

    public function search_data(Request $req){

     

        if($req->search_data != null ){
          
            $data =  DB::table('users')
            ->where('first_name','LIKE',$req->search_data.'%')              
            ->join('designations','designations.id','=','users.designation_id')
            ->select('users.id','users.first_name','users.last_name','users.official_email_address','designations.designation_name','users.image','users.gender','users.skype_id')
            ->get();
           
        }else{

         
            $data =  DB::table('users')
            ->join('designations','designations.id','=','users.designation_id')
            ->select('users.id','users.first_name','users.last_name','users.official_email_address','designations.designation_name','users.image','users.gender','users.skype_id')
            ->get();
        }

        

        return view('employee_directory',compact('data'));


    }
    
}
