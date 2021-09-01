<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       // return 'dashboartd colntrollllllllller';
    }
    // public function login(){
    //     return "hello login";
    // }
    // public function register(){
    //     return "hello register";
    // }
    // public function password(){
    //     return "hello password";
    // }
    // public function login(){
    //     return "hello login";
    // }
}
