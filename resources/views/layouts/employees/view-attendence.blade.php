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
                                    

                                            <select class="selectname" name="state">
                                                <option value="">select name</option>
                                                @foreach ($employees as $employee) 
                                                    
                                                <option value="{{$employee->id}}"> {{$employee->id}} {{ $employee->first_name ." ". $employee->last_name }}</option> 
                                                 @endforeach 
                                              </select>
                                        </div>
                               </div>
                               <div class="col-md-6">
                                
                                <div class="form-group"  >
                                    <select name="selectcity" id="select_cities"style = "margin-left:240px;" class="selectpicker pull-right" value="{{ old('department') }}">
                                        <option value="">Filter</option>
                                        <option value="This Month">This Month</option> 
                                        <option value="Previous Month">Previous Month</option> 
                                        <option value="Custom">Custom</option> 
                                        {{-- <option value="This Month">This Month</option>  --}}
                                        
                                    </select>
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
