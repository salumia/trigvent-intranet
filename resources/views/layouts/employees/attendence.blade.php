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
                          
                           <div class="col-sm-3 bg-warning text-center">
                           <div class="card emp_card" style="padding:10px;  margin-bottom: -10px; position: relative; " >
                            <div class="row">
                                <div class="col-sm-6 ">
                                   <span><b>{{ config('constants.yesterday')}}</b></span>
                                </div>
                                <div class="col-sm-6 ">
                                  
                                  <input id="hiddenDate" type="hidden" />
                                  <span  style=" margin-left: 47px;"><a id="pickDate" href="#"><b>Edit</b></a></span>
                               </div>
                                
                            </div>
                           {{-- <img class="card-img-top" style="" width="100px" height="100px" src="{{ url('/public/employee-images/' . $employees[0]->image) }}" alt="Card image cap"> --}}

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
                            
                             <button type="button" id="present" class="btn btn-success present done">Present</button>
                             <button type="button" id="halfday" class="btn btn-primary halfday">Half Day</button>
                             <button type="button" id="absent" class="btn btn-danger absent">Absent</button>
                              </div>
                           </div>

                       </div>
                           <div class="card punchingcard punching_time text-center" style="display:none;" id="punching_time" >
                                <div class="row " style="padding: 10px; margin-top:10px; " >
                              
                                 <form action="">
                                  <input type="hidden" value="{{$employee->id}}" id="present_emp_id">
                                   <div class="col-md-6">
                                       <input type="time"  style="font-size: 10px;" name="last_name" class="form-control" placeholder="In Time" value="">            
                                       {{-- <input placeholder="In Time" type="text" id="input_starttime" class="form-control timepicker"> --}}
                                   </div>
                                   <div class="col-md-6" style="margin-left:-20px; position:relative;">
                                       <input type="time" style="font-size: 10px;" name="last_name" class="form-control" placeholder="Out Time" value="">
                                   </div>   
                                   <div style="position:absolute;margin-top:5px; margin-left: 186px;" id="add_new_punch"><i class="fa fa-plus-circle add_new_punch" style="font-size: 22px; color:green;"></i></div>
                                   <div style="position:absolute;margin-top:-21px; margin-left: 195px; " id="done_punch"><a href="javascript:void(0);"><i class="fa fa-check-square done_punch" style="font-size: 18px; color:#1f91f3 ;"></i></a></div>
                                  </form>
                                  
                                </div> 

                               
                              

                          </div>
                        
                      </div>
                           @endforeach
                               

                                {{-------------------------------------First Card end here-------------------------------------------}} 
                             
                             
                             {{-- <div class="col-sm-3 bg-danger text-center">
                               
                                <div class="card emp_card" style="padding:10px; " >
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                           <span><b>09-07-2021</b></span>
                                        </div>
                                        <div class="col-sm-6 ">
                                          <span><a href="#"><b>Edit</b></a></span>
                                       </div>
                                        
                                    </div>
                                   <img class="card-img-top" style="" width="100px" height="100px" src="{{ url('/public/employee-images/' . $employees[0]->image) }}" alt="Card image cap">
                                   <div class="card-body" style="margin-top: 10px;">
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <div class="pha_button">
                                     <button type="button" class="btn btn-success">Present</button>
                                     <button type="button" class="btn btn-primary">Half Day</button>
                                     <button type="button" class="btn btn-danger">Absent</button>
                                      </div>
                                   </div>
                                 </div>

                            </div>
                            <div class="col-sm-3 bg-success text-center">
                               
                                <div class="card emp_card" style="padding:10px; " >
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                           <span><b>09-07-2021</b></span>
                                        </div>
                                        <div class="col-sm-6 ">
                                          <span><a href="#"><b>Edit</b></a></span>
                                       </div>
                                        
                                    </div>
                                   <img class="card-img-top" style="" width="100px" height="100px" src="{{ url('/public/employee-images/' . $employees[0]->image) }}" alt="Card image cap">
                                   <div class="card-body" style="margin-top: 10px;">
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                       <div class="pha_button">
                                     <button type="button" class="btn btn-success">Present</button>
                                     <button type="button" class="btn btn-primary">Half Day</button>
                                     <button type="button" class="btn btn-danger">Absent</button>
                                     </div>
                                   </div>
                                 </div>

                            </div>
                            <div class="col-sm-3 bg-success text-center">
                               
                                <div class="card emp_card" style="padding:10px; " >
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                           <span><b>09-07-2021</b></span>
                                        </div>
                                        <div class="col-sm-6 ">
                                          <span><a href="#"><b>Edit</b></a></span>
                                       </div>
                                        
                                    </div>
                                   <img class="card-img-top" style="" width="100px" height="100px" src="{{ url('/public/employee-images/' . $employees[0]->image) }}" alt="Card image cap">
                                   <div class="card-body" style="margin-top: 10px;">
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                       <div class="pha_button">
                                        <button type="button" class="btn btn-success">Present</button>
                                        <button type="button" class="btn btn-primary">Half Day</button>
                                        <button type="button" class="btn btn-danger">Absent</button>
                                        </div>
                                   </div>
                                 </div>

                            </div>
                            <div class="col-sm-3 bg-success text-center">
                               
                                <div class="card emp_card" style="padding:10px; " >
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                           <span><b>09-07-2021</b></span>
                                        </div>
                                        <div class="col-sm-6 ">
                                          <span><a href="#"><b>Edit</b></a></span>
                                       </div>
                                        
                                    </div>
                                   <img class="card-img-top" style="" width="100px" height="100px" src="{{ url('/public/employee-images/' . $employees[0]->image) }}" alt="Card image cap">
                                   <div class="card-body" style="margin-top: 10px;">
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                       <div class="pha_button">
                                        <button type="button" class="btn btn-success">Present</button>
                                        <button type="button" class="btn btn-primary">Half Day</button>
                                        <button type="button" class="btn btn-danger">Absent</button>
                                        </div>
                                   </div>
                                 </div>

                            </div> --}}



                         </div>
                        </div>

                        {{-- <div class="row">
                        @foreach ($employees as $employee)
                        <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            @if ($employee->image)
                            <img src="{{ url('/public/employee-images/' . $employee->image) }}"
                                alt="image"   id="emp_image"
                                style="margin-bottom:20px; margin-top:-10px;">
                            @else
                            @if ($employee->gender == 'male')
                            <img src="{{ url('/public/employee-images/avatar-male.png') }}"
                            alt="image"   id="emp_image"
                            style="margin-bottom:20px; margin-top:-10px;">
                            @else
                            <img src="{{ url('/public/employee-images/avatar-female.png') }}"
                            alt="image"   id="emp_image"
                            style="margin-bottom:20px; margin-top:-10px;">
                            @endif
                        @endif
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                      </div>
                        @endforeach
                    </div> --}}


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
