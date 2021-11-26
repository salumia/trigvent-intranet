<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Uploadfile;
use Illuminate\Support\Facades\DB;

class GoogledriveController extends Controller
{
    public function upload_file(Request $req){
        $id = "";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        
        $employees = DB::table('users')->first();
        
        return view('layouts.employees/uploadOnGoogledrive',compact('employees','id'));
    }
    
    // $details = $files = Storage::disk("google")->getMetadata($firstFileName);
    public function drive_store(Request $request){
        
        
        $dirName = "Emp-". $request->emp_id;   
        $directoryId = 0;

         $directory =  Storage::disk('google')->getAdapter()->getMetadata($dirName);
        // echo "Step here";
        // echo "<pre>";
        // print_r($directory);
        // echo "</pre>";
        // die();
        $dirs = Storage::disk("google")->directories();

    $arrLength = count($dirs);
    $notfound = true;
    $directoryId = "";
    for($x = 0;$x<$arrLength;$x++){
        $directory =  Storage::disk('google')->getAdapter()->getMetadata($dirs[$x]);
        if ($directory["name"]  == "Emp-".$request->emp_id ) {                  
            $directoryId = $directory['path'];
            $notfound = false;
            break;
        }
    }
    if($notfound){
        $folder= Storage::disk("google")->makeDirectory($dirName); 
        $newDirectory =  Storage::disk('google')->getAdapter()->getMetadata($dirName);
        $directoryId = $newDirectory['path'];
    }

        $store =  $request->file("upload_file")->store($directoryId,"google");       
        $url = Storage::disk("google")->url($store);
        
        DB::table('uploadfiles')->insert([
            'emp_id' => $request->emp_id,
            'file_name' => $url
        ]);
        return redirect(route('upload_file',['id' =>$request->emp_id]))->with('status', ' File uploaded ');
    }
}

//   Storage::disk('google')->put('test1.txt', 'Hello World how are you');
        //   Storage::disk('google')->putFileAs("", $request->file("upload_file"),"file_name");
// $files = Storage::disk("google")->allFiles();
    // dump("FILE NAME:" .  $firstFileName);
        // dump($details);