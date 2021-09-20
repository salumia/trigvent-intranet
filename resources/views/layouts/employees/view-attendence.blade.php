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
                                            <select name="selectname" id="select_name" class="selectpicker" value="{{ old('department') }}">
                                                <option value="">Select Employee Name</option>
                                                @foreach ($employees as $employee) 
                                                    {{-- <option {{ old('department') == $dep->id ? 'selected' : '' }} --}}
                                                        <option
                                                        value="">{{ $employee->first_name ." ". $employee->last_name }}</option> 
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





                    </div>
                </div>

            </div>



        </div>

    </div>



@endsection



@section('extra-script')







@endsection
