



<!doctype html>
<html>
<head>
    {{-- @include('includes.head') --}}

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Welcome To Trigvent-HRMS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Bootstrap Core Css -->
     @section('css')
     {{ Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap.css') }}
     {{ Html::style('public/bsbmd/plugins/node-waves/waves.css') }}
     {{ Html::style('public/bsbmd/plugins/animate-css/animate.css') }}
     {{ Html::style('public/bsbmd/plugins/morrisjs/morris.css') }}
     {{ Html::style('public/bsbmd/css/style.css') }}
     {{ Html::style('public/bsbmd/css/themes/all-themes.css') }}
     {{ Html::style('public/bsbmd/plugins/bootstrap-select/css/bootstrap-select.css') }}
     {{ Html::style('public/bsbmd/css/my.css') }}
     {{ Html::style('public/bsbmd/css/select2.min.css') }}
     {{ Html::style('public/bsbmd/css/bootstrap-toggle.min.css') }}
     {{ Html::style('public/bsbmd/css/timepicker.min.css') }}

     
     {{-- {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap.min.css')}}
     {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.css')}}
     {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.min.css')}}  --}}

      <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

     @show

     @yield('extra-css')

</head>
<body>
<div class="container-fluid">

    <header class="row">

        {{--  header start here   --}}

        <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid" style="background:#f44336;">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" style="color: white; padding-left: 35px; padding-top: 0px;" href=""><span><img src="{{asset('public/employee-images/logo1.png')}}" style="  width: 140px;" alt="image1"></span> </a>
                {{-- <img src="public/employee-images/logo1.png" alt="image1">  --}}
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                 
                   
                    {{-- <li class=""><a href="javascript:void(0);" style="color: white;" class="js-right-sidebar setting_css_navebar" data-close="true"> <i class="material-icons">settings</i></a></li> --}}
                    
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle drop_menu" data-toggle="dropdown" role="button">
                            <i class="material-icons" style="color: white">more_vert</i>
                           
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header myheader"></li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <div class="icon-circle " style = " background-color:#8BC34A;" >
                                                {{-- <i class="material-icons">person_add</i> --}}
                                                <i class="material-icons " style="color:white;">person</i>
                                            </div>
                                            <div class="menu-info my-menu-info ">
                                                <h4>Login</h4>
                                                
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-circle bg-warning" style = " background-color:#00BCD4;" >
                                                
                                                <i class="material-icons " style="color:white;">key</i>
                                            </div>
                                            <div class="menu-info my-menu-info">
                                                <h4 >Setting</h4>
                                               
                                            </div>
                                        </a>
                                    </li>
                                 <li>
                                        <a href="javascript:void(0);" >
                                            <div class="icon-circle bg-danger" style = " background-color:#FF9800;" >
                                                <i class="material-icons " style="color:white;">input</i>
                                                {{-- <i
                                    class="material-icons">input</i> --}}
                                            </div>
                                            <div class="menu-info my-menu-info">
                                                <h4>About Us</h4>
                                                
                                            </div>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

     

    </header>

    <div class="container-fluid">
        <div class="block-header" style="margin-bottom: 72px;">
            {{-- <h2> ADD ATTENDENCE</h2> --}}
        </div>
        <div class="row clearfix ">

            <div class="col-xs-12 col-sm-12" style="width: 103%; left:-20px;">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-12" style="margin-top:10px;">
                                
                               <div class="row">
                                   <div class="col-sm-1 "></div>
                                   <form action="{{Route('directory_search_data')}}" method="GET">
                                   <div class="col-sm-8 text-center " style="left: 15px;">
                                     
                                    <input type="text" id="form1" name="search_data" placeholder="Search..." class="form-control" />
                                 
                                    </div>

                                   <div class="col-sm-3 " style="left: -17px; margin: -1px;"> 
                                        <button type="submit" style=" width:70px;" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                                    <button type="submit" style=" width:70px;" class="btn btn-warning"><i class="fa fa-reply-all"></i> </button>
                                </div>
                            </form>

                               </div>
                            
                            </div>
                         <div class="col-sm-12" style="padding-left:100px;">
                          {{-- ------------------------------------- First Card start here ------------------------------------------- --}} 
                          
                           {{-- @php  if($data == ""){
                                 echo "<h2>No Record Found! </h2>";
                           }else{   @endphp --}}

                           @php    
                                if(count($data) <= 0){
                                  echo '<div class="col-sm-12 text-center bg-warning"><h1 ">No Record Found! </h1></div>';
                                }
                                else{
                                
                               
                                @endphp

                            @foreach ($data as $index=>$employee)  
                          
                           <div class="col-sm-3 " style="margin-bottom:40px; width:22%;  ">

                            <div class="card emp_card" style="padding:10px;  margin-bottom: -10px; height:90px; background:#ad1455; " >
                                <div class="row">
                                    <div class="col-sm-12 text-center" ">
                                    </div>
                                   </div>
                                </div>

                           <div class="card emp_card" style="padding:10px;  margin-bottom: -10px; position: relative; " >
                            <div class="row">
                                <div class="col-sm-12 text-center" style="position: relative">
                                  
                                   

                            @if ($employee->image) 
                            <img src="{{ url('/public/employee-images/' . $employee->image) }}"
                                alt="image" style="border-radius: 50%;  position:absolute; top:-66px; left:72px;" width="100px;" height="100px" class="card-img-top">

                            @else
                            @if ($employee->gender == 'male')
                                <img src="{{ url('/public/employee-images/avatar-male.png') }}"  
                                    alt="Admin" style="border-radius: 50%;  position:absolute; top:-66px; left:72px;" width="100px" height="100px" class="card-img-top">
                            @else

                            <img src="{{ url('/public/employee-images/avatar-female.png') }}" 
                                alt="Admin" style="border-radius: 50%;  position:absolute; top:-66px; left:72px;" width="100px" height="100px" class="card-img-top">
                                @endif
                            @endif                                                           
                                </div>                        
                            </div>
            
                           <div class="card-body" >
                             <p class="card-text">
                               <div class="row">
                                   <div class="col-sm-12 developer_details text-center" style="margin-top: 15px;">

                                    <span class="text-center" style="word-break: break-word; font-size:20px;"><b> @php echo ucwords($employee->first_name); echo " "; echo ucwords($employee->last_name); @endphp</b> </span> <br>
                                <ul style="list-style: none; line-height: 25px;">
                                   <li> Skype ID : <span style="word-break: break-word;"><span> {{ $employee->skype_id }}  </span> <br></li>
                                   <li> <span style="word-break: break-word; color:#ad1455;"><b> @php echo ucwords($employee->designation_name);   @endphp </b></span> <br> </li>                                   
                                   <li> <span style="word-break: break-word; "> {{$employee->official_email_address}} </span> <br> </li>   
                                </ul>
                                   </div>

                              
                              </div>
                               
                             </p>
                       
                           </div>
                           
                        </div>
                      </div>
                           @endforeach  

                            @php  } @endphp
                               

                            {{--   -------------------------------------First Card end here------------------------------------------ --}}
                             
                             
                           



                         </div>
                        </div>

                      


                    </div>
                </div>
            </div>

            
        </div>
    </div>
    </div>

    <footer class="row">
        {{-- @include('includes.footer') --}}
    </footer>

</div>



@section('script')
        {{Html::script('public/bsbmd/plugins/jquery/jquery.min.js')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/js/bootstrap.js')}}
        
        {{-- {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.min.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.min.css')}} --}}
        {{Html::script('public/bsbmd/plugins/bootstrap-select/js/bootstrap-select.js')}}
        {{Html::script('public/bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
        {{Html::script('public/bsbmd/plugins/node-waves/waves.js')}} 
        
        {{Html::script('public/bsbmd/js/select2.min.js')}} 
        {{Html::script('public/bsbmd/js/bootstrap-toggle.min.js')}} 
        {{Html::script('public/bsbmd/js/timepicker.min.js')}} 
        {{Html::script('public/js/my.js?v=12')}} 
         
       

    @show    
    @yield('extra-script')
    @section('script-bottom')
        {{Html::script('public/bsbmd/js/admin.js')}}
        {{Html::script('public/bsbmd/js/demo.js')}}
        {{-- {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.css.map')}} --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/form-validation.js')}}  --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/editors.js')}} --}}
        {{Html::script('public/bsbmd/plugins/jquery-steps/jquery.steps.min.js')}}
        {{Html::script('public/bsbmd/plugins/jquery-validation/jquery.validate.js')}}
        
        {{Html::script('public/bsbmd/js/pages/forms/form-wizard.js')}}
        {{-- {{Html::script('public/js/my.js')}}  --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/basic-form-elements.js')}} --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/advanced-form-elements.js')}} --}}
        {{-- {{Html::script('public/bsbmd/plugins/jquery-steps/jquery.steps.min.js')} --}}
        
    @show


</body>
</html>
