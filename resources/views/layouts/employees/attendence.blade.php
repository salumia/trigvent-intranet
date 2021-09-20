@extends('index')

@section('title')
@endsection


@section('extra-css')

@endsection
@section('content')
    {{-- <section class="content"> --}}
    <div class="container-fluid">
        <div class="block-header">
            <h2> ATTENDENCE MANAGEMENT</h2>
        </div>
        <div class="row clearfix ">

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                         <div class="col-sm-12">
                           {{------------------------------------- First Card start here -------------------------------------------}}   
                           
                           @foreach ($employees as $index=>$employee)
                          
                           <div class="col-sm-3 text-center" style="margin-top:18px;">
                           <div class="card emp_card" style="padding:10px;  margin-bottom: -10px; position: relative; " >
                            <div class="row">
                                <div class="col-sm-12 ">
                                   {{-- <span><b>{{ config('constants.yesterday')}}</b></span> --}}
                                   <input type="date" id="hiddenDate" style = "border: none;width:100%;" value="{{config('constants.yesterday')}}">
                                </div>
                               
                                
                            </div>
                          

                           @if ($employee->image)
                           <img src="{{ url('/public/employee-images/' . $employee->image) }}"
                                alt="image" style="" width="100px" height="100px" class="card-img-top">

                       @else
                           @if ($employee->gender == 'male')
                               <img src="{{ url('/public/employee-images/avatar-male.png') }}"  
                                   alt="Admin" style="" width="100px" height="100px" class="card-img-top">
                            @else
                           
                           <img src="{{ url('/public/employee-images/avatar-female.png') }}" 
                               alt="Admin" style="" width="100px" height="100px" class="card-img-top">
                               @endif
                       @endif

                           <div class="card-body" style="margin-top: 10px;">
                             <p class="card-text">
                               <span class="u-info capitalize"><b>{{ $employee->first_name }}
                              {{ $employee->last_name }} </b></span> <br>
                             

                              
                                @for($i = 0; $i < $des; $i++)
                                @if($desig[$i]->id == $employee->designation_id)
                                 <span class="u-info ">{{ $desig[$i]->designation_name }}</span>
                                @endif
                                @endfor
                               
                            </p>
                            
                             <div class="pha_button">                             
                                <button type="button" id="present" class="btn btn-success present done" data="1">Present</button>
                                <button type="button" id="halfday" class="btn btn-primary halfday" data="2">Half Day</button>
                                <button type="button" id="absent" class="btn btn-danger absent" data="0">Absent</button>
                                
                            </div>
                            <div class="pha_status  text-center" style=""><span style="font-size:17px; color:white;position: absolute; left: 50px; top: 11px;"><b>PRESENT</b></span></div>              
                           </div>
                          
                          
                          

                       </div>
                           <div class="card punchingcard punching_time text-center" style="display:none;" id="punching_time" >
                                <div class="row " style="padding: 10px; margin-top:10px; " >
                              
                                 <form action="">
                                  <input type="hidden" value="{{$employee->id}}" id="present_emp_id">
                                   <div class="col-md-6">
                                       <input type="time"  id="intime" style="" name="last_name" class="form-control time-picker intime"  placeholder="In Time" value="">            
                                       {{-- <input placeholder="In Time" type="text" id="input_starttime" class="form-control timepicker"> --}}
                                   </div>
                                   <div class="col-md-6" style="margin-left:-20px; position:relative;">
                                      <input type="time" id="outtime" style="" name="last_name" class="form-control time-picker outtime" placeholder="Out Time" value="">

                                   </div>   
                                   
                                   <div style="position:absolute;margin-top:5px; margin-left: 186px;" id="add_new_punch"><i class="fa fa-plus-circle add_new_punch" style="font-size: 22px; color:green;"></i></div>
                                   <div style="position:absolute;margin-top:-21px; margin-left: 195px; " class="done_punch"><a href="javascript:void(0);"><i class="fa fa-check-square " style="font-size: 18px; color:#1f91f3 ;"></i></a></div>
                                  </form>
                                  
                                </div> 

                               
                              

                          </div>
                        
                      </div>
                           @endforeach
                               

                                {{-------------------------------------First Card end here-------------------------------------------}} 
                             
                             
                           



                         </div>
                        </div>

                      


                    </div>
                </div>
            </div>

            
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('extra-script')

  

@endsection
