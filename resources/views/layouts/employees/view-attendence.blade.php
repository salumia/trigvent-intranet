@extends('index')



@section('title')



@endsection



@section('extra-css')



@endsection



@section('content')

    <div class="container-fluid">

        <div class="block-header">

            <h2>VIEW ATTENDENCE</h2>

        </div>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">

                    <div class="body">

                        <div class="row">


                            <div class="col-md-6">
                                
                                        <div class="form-group"  >
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    

                                            <select id = "selectname"class="selectname" name="state" style="width: 366px">
                                                <option value="">select name</option>
                                                @foreach ($employees as $employee) 
                                                    
                                                <option value="{{$employee->id}}" data-emp="{{$employee->first_name}} {{$employee->last_name}}"> {{$employee->id}} {{ $employee->first_name ." ". $employee->last_name ."    " }}   [{{ $employee->personal_email_address  }}]</option> 
                                                 @endforeach 
                                              </select>
                                        </div>
                               </div>
                               
                               <div class="col-md-6">
                                <div class="form-group"  >
                                    <select name="datefilter" id="datefilter"style = "margin-left:240px;" class="selectpicker pull-right" value="{{ old('department') }}">
                                        {{-- <option value="0">Filter</option> --}}
                                        <option value="1" selected>This Month</option> 
                                        <option value="2">Previous Month</option> 
                                        <option id = "customdate" value="3" >custom date</option>                                         
                                    </select>
                                </div>
                       </div>

                       <div class="col-md-12">
                             <div class="row">
                                 <div class="col-sm-7 " style="text-align:end" id="name_print">
                                  
                                        <h2 id="name_print1"></h2>

                                 </div>
                                 <div class="col-sm-5 pull-right hidden_div"  style="margin-right: -39px ;">
                                     <div class="col-sm-5">
                                          <label for="from">From</label>
                                          <input value = "" id="from" class="" type="date" style="width:131px;border: none;border-bottom: 1px solid lightgrey;">
                                    </div>
                                     <div class="col-sm-5">
                                         <label for="to">To</label>
                                         <input value = "" id="to" class="" type="date" style="width:131px;border: none;border-bottom: 1px solid lightgrey;">
                                    </div>
                                     <div id=class="col-sm-2"><i id="search"value = "4"class="fa fa-search" style="margin-top:31px;" aria-hidden="true"></i></div>
                                 </div>
                             </div>

                       </div>
                    
                     

                        </div>
                       
                        
                        <div class="row">
                        
                          <div class="col-sm-12 text-center bg-warning attendence_table">
                            <h1>Select the employee name </h1>
                            
                          </div>
                      </div>
                        



                    </div>
                </div>

            </div>



        </div>

    </div>



@endsection



@section('extra-script')
    <script>
        // $('.selectname').select2();
    </script>






@endsection
