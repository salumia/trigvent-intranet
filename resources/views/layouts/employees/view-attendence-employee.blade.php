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


                            <div >
                                
                                        <div class="form-group"  >
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">       
                                            <input type="hidden" data-emp="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" id = "selectname" value="{{Auth::user()->id}}">
                                            
                                              
                                        </div>
                               </div>
                               <div class="col-md-6">
                                <h2>Current year accrued leaves:{{Auth::user()->current_year_accrued_leaves}}</h2>
                                <h2>Last year accrued leaves:{{Auth::user()->last_year_accrued_leaves}}</h2>
                            </div>
                               <div class="col-md-6">
                                <div class="form-group"  >
                                    <select name="datefilter" id="datefilter"style = "margin-left:240px;" class="selectpicker pull-right" value="{{ old('department') }}">
                                        {{-- <option value="0">Filter</option> --}}
                                        <option value="">Filter</option> 
                                        <option value="1" >This Month</option> 
                                        <option value="2">Previous Month</option> 
                                        <option id = "customdate" value="3" >custom date</option>                                         
                                    </select>
                                </div>
                       </div>

                       <div class="col-md-12">
                             <div class="row">
                                 <div class="col-sm-12 "  id="name_print">
                                  
  
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
                                     <div id="col-sm-2"><i id="search"value = "4"class="fa fa-search" style="margin-top:31px;" aria-hidden="true"></i></div>
                                 </div>
                             </div>

                       </div>
                    
                        </div>
                       


                        @php
                                                        
                      $total_hour = 0 ;
                      $total_minutes = 0 ;
                      $total_working_time = 0;
                
                      function hoursMinute( $time_in,$time_out){
                                 $time_i = explode(':',$time_in);
                                 $time_o = explode(':',$time_out);
                               
                                 $minute_o = (int)($time_o[0]) * 60 + (int)($time_o[1]);
                                  $minute_i = (int)($time_i[0]) * 60 + (int)($time_i[1]);
                                  $diff = ($minute_o -  $minute_i);
                                
                                return $diff;
                               // return $time_in;
                            }

                            function convertMinuteToHoursMinute($minutes){
                           $hr = floor($minutes/60);
                           $min = $minutes % 60;
                           return $hr . " Hrs " . $min . " Mins";
                         }

                            @endphp


                        <div class="row">
                            
                           
                          <div class="col-sm-12 text-center bg-warning attendence_table">
                            <table class='table table-striped'>
                                <thead class="text-center">
                                    <tr>
                                        
                                        <th scope='col'>Date</th>
                                        <th scope='col'>status</th>
                                        <th scope='col'>Punch in</th>
                                        <th scope='col'>Punch_out</th>
                                        <th scope='col'>Designation</th>
                                        <th scope='col'>Total Hours</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($employees as $index => $employee)
                                    <tr style='text-align:left;'>
                            

        
                                            <td>{{ $employee->date }}</td>
        
                                            <td>{{ $employee->status }}</td>
        
                                            
                                            <td>{{ $employee->punch_in }}</td>
        
                                            <td>{{ $employee->punch_out }}</td>
        
                                            <td>{{ $employee->designation_name }}</td>

                                            <td>{{ convertMinuteToHoursMinute(hoursMinute($employee->punch_in,$employee->punch_out)) }}</td>

                                            @php
                                                $total_working_time += hoursMinute($employee->punch_in,$employee->punch_out);
                                            @endphp
                                    </tr>
                                    @endforeach
                                </tbody>
                                    </table>

                            
                          </div>

                        <div class="col-sm-12">
                             <div class="col-sm-8"> 
                                 <h3 id = "twh"  >Total  working hours : </h3>
                            </div>
                         <div class="col-sm-4"> 
                             <h4 id="time_hour" style="padding: 13px;text-align: right;">  {{convertMinuteToHoursMinute($total_working_time)}} </h4>
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
    <script>
        // $('.selectname').select2();
    </script>






@endsection
