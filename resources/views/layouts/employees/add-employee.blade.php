@extends('index')



@section('title')



@endsection



@section('extra-css')



@endsection



@section('content')

    <div class="container-fluid">

        <div class="block-header">

            <h2>ADD EMPLOYEE</h2>

        </div>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">





                    <div class="body">

                      

                        @if (session()->has('status'))

                        <div class="alert bg-green alert-dismissible" style="border-radius:5px;" role="alert">

                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

                          <span style="color:white; margin:20px; ">{{ session('status') }}</span>

                      </div>

                        @endif





                        <form id="add_employee_form" method="post" action="{{ route('storeEmployee') }}"

                            enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="sub_section_heading first">

                                    <h4><b><u>Personal Details</u> </b></h4>

                                    </p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="" class="required">First Name</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="first_name" class="form-control"

                                                placeholder="Enter First Name" value="{{ old('first_name') }}">

                                            {{-- value="{{old('first_name')}}" --}}

                                        </div>



                                        <div class="custome_errors1"></div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="">Last Name</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="last_name" class="form-control"

                                                placeholder="Enter Last Name" value="{{ old('last_name') }}">

                                        </div>



                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="">Father's Name</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="father_name" class="form-control"

                                                placeholder="Enter Father Name" value="{{ old('father_name') }}">

                                        </div>



                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="" class="required">Date of Birth</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="date" onkeypress="return false;" name="dob" class="form-control"

                                                placeholder="Select D.O.B" value="{{ old('dob') }}">

                                        </div>



                                        <div class="custome_errors2"></div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="required">Gender</label>

                                    <div class="form-group m-t-10">

                                        <span class="">

                                            <input type="radio" class="with-gap" id="ig_radio_m"

                                                {{ old('gender') == 'male' ? 'checked' : '' }} value="male" name="gender">

                                            <label for="ig_radio_m">Male</label>

                                        </span>

                                        <span class="m-l-10">

                                            <input type="radio" class="with-gap" id="ig_radio_f"

                                                {{ old('gender') == 'female' ? 'checked' : '' }} value="female"

                                                name="gender" value="{{ old('gender') }}">

                                            <label for="ig_radio_f">Female</label>

                                            {{-- {{old('department') == $dep->id ? "selected" : ""}} --}}

                                        </span>

                                        <div class="custome_errors3 text-danger"></div>

                                    </div>





                                </div>

                                <div class="col-md-4">

                                    <label for="">Image</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="file" name="image" class="form-control" accept=".jpeg,.png,.jpg,.gif,.svg"

                                                value="{{ old('image') }}">

                                        </div>

                                        <span class="text-danger">@error('image')

                                            {{ $message }}

                                        @enderror</span>

                                        {{-- <div class="custome_errors10 text-danger"></div> --}}



                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="sub_section_heading">

                                    <h4><b><u>Contact Details</u> </b></h4>

                                    </p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="" class="required">Personal Email Address </label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="personal_email_address" class="form-control"

                                                placeholder="Enter Email Address"

                                                value="{{ old('personal_email_address') }}">

                                        </div>

                                        <div class="custome_errors4 text-danger"></div>

                                        <span class="text-danger">@error('personal_email_address')

                                                {{ $message }}

                                            @enderror</span>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="">Official Email Address </label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="official_email_address" class="form-control"

                                                placeholder="Enter Email Address"

                                                value="{{ old('official_email_address') }}">

                                        </div>



                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="required">Mobile Number</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="number"  name="mobile_number" class="form-control"

                                                placeholder="Enter Mobile Number" value="{{ old('mobile_number') }}">

                                        </div>

                                        <span class="text-danger">@error('mobile_number')

                                            {{ $message }}

                                        @enderror</span>



                                        <div class="custome_errors5 text-danger"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="" class="">Alternate Number</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="number" name="alternate_number" class="form-control"

                                                placeholder="Enter Alternate Number"

                                                value="{{ old('alternate_number') }}">

                                        </div>

                                        <span class="text-danger">@error('alternate_number')

                                            {{ $message }}

                                        @enderror</span>

                                        



                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label for="" class="">Address</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="address" class="form-control"

                                                placeholder="Enter Address" value="{{ old('address') }}">

                                        </div>



                                    </div>

                                </div>

                                  <div class="col-md-4">
                                        
                                        <label for="" class="">State</label>
                                        <div class="form-group">
                                            
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <select name="selectstate"  id="selectstate" class="selectpicker" value="{{ old('allState') }}">
                                                <option value="">Select State</option>
                                                
                                           
                                                @foreach($allState as $st)
                                                <option  value="{{ $st->state_code }}">{{ $st->state_name }}</option>
                                               @endforeach

                                            </select>
                                            
                                        </div>
    
    
                                    </div>

                                <!-- <div class="col-md-4">

                                    <label for="" class="">City</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="city" class="form-control" placeholder="Enter City"

                                                value="{{ old('city') }}">

                                        </div>



                                    </div>

                                </div> -->

                            </div>

                            <div class="row">
                               
                                <div class="col-md-4">
                                <label for="" class="">City</label>
                                        <div class="form-group"  >
                                            <select name="selectcity" id="select_cities" class="selectpicker" value="{{ old('department') }}">
                                                <option value="">Select City</option>
                                                {{-- @foreach ($departments as $dep) 
                                                    <option {{ old('department') == $dep->id ? 'selected' : '' }}
                                                        value="{{ $dep->id }}">{{ $dep->department_name }}</option> 
                                                 @endforeach  --}}
                                            </select>
                                        </div>
                               </div>

                               <!--  <div class="col-md-4">

                                    <label for="" class="">State</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="state" class="form-control" placeholder="Enter State"

                                                value="{{ old('state') }}">

                                        </div>



                                    </div>

                                </div> -->

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="sub_section_heading">

                                    <h4><b><u>Official Details</u> </b></h4>

                                    </p>

                                </div>

                            </div>

                            <div class="row">

                                {{-- <div class="col-md-4">

                                <label for="" class="required">Employee ID</label>

                                <div class="form-group">

                                    <div class="form-line">

                                        <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID"  value="{{old('first_name')}}">

                                    </div>

                                    <span class="text-danger">@error('employee_id')

                                        {{$message}}

                                    @enderror</span>

                                </div>

                            </div> --}}

                                <div class="col-md-4">

                                    <label for="" class="required">Department</label>

                                    <div class="form-group">

                                        {{-- <select class="form-control show-tick" data-live-search="true" name="department">

                                        <option value="">Select Department</option>

                                        

                                    </select> --}}

                                        <select name="department" id= "department" class="selectpicker" value="{{ old('department') }}">

                                            <option value="">Select Department</option>

                                            @foreach ($departments as $dep)

                                                <option {{ old('department') == $dep->id ? 'selected' : '' }}

                                                    value="{{ $dep->id }}">{{ $dep->department_name }}</option>

                                            @endforeach

                                        </select>

                                        <div class="custome_errors6 text-danger"></div>

                                    </div>





                                </div>

                                <div class="col-md-4">

                                    <label for="" class="required">Designation</label>

                                    <div class="form-group">

                                        <select name="designation" id = "designation" class="form-control" value="{{ old('department') }}">

                                            <option value="">Select Designation</option>

                                            @foreach ($designations as $des)

                                                <option {{ old('designation') == $des->id ? 'selected' : '' }}

                                                    value="{{ $des->id }}">{{ $des->designation_name }}</option>

                                            @endforeach



                                        </select>

                                        <div class="custome_errors7 text-danger"></div>

                                    </div>





                                </div>

                                <div class="col-md-4">

                                    <label for="" class="required">Joining Date</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="date" onkeypress="return false;" name="joining_date"

                                                class="form-control" placeholder="Select Joining Date"

                                                value="{{ old('joining_date') }}">

                                        </div>



                                        <div class="custome_errors8 text-danger"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">



                                {{-- <div class="col-md-4">

                                <label for="">Joining Salary</label>

                                <div class="form-group">

                                    <div class="form-line">

                                        <input type="text" name="joining_salary" class="form-control" placeholder="Enter Joining Salary"  value="{{old('joining_salary')}}">

                                    </div>

                                    <span class="text-danger">@error('joining_salary')

                                        {{$message}}

                                    @enderror</span>

                                </div>

                            </div> --}}

                               <!--  <div class="col-md-4">

                                    <label for="" class="required">Emp. Login Password</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="password" name="password" class="form-control"

                                                placeholder="Enter Password" value="{{ old('password') }}">

                                        </div>



                                        <div class="custome_errors9 text-danger"></div>

                                    </div>

                                </div> -->

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="sub_section_heading">

                                    <h4><b><u>Bank Details</u> </b></h4>

                                    </p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="">Account Holder Name</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="bank_account_name" class="form-control"

                                                placeholder="Enter Account Name" value="{{ old('bank_account_name') }}">

                                        </div>



                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="">Bank Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bank_name" class="form-control"
                                                placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <label for="">Account Number</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="number" name="bank_account_number" class="form-control"

                                                placeholder="Enter Account Number"

                                                value="{{ old('bank_account_number') }}">

                                        </div>

                                        <span class="text-danger">@error('bank_account_number')

                                            {{ $message }}

                                        @enderror</span>



                                    </div>

                                </div>
								</div>
								
                                <div class="row">
                                <div class="col-md-4">

                                    <label for="">IFSC Code</label>

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="bank_ifsc_code" class="form-control"

                                                placeholder="Enter Account Name" value="{{ old('bank_ifsc_code') }}">

                                        </div>

                                        <span class="text-danger">@error('bank_ifsc_code')

                                            {{ $message }}

                                        @enderror</span>



                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <!-- <div class="align-center font-bold align-left" id="response"></div>

                                    <button type="button" class="btn btn-info btn-lg waves-effect pull-left"

                                        data-toggle="modal" data-target="#myModal">Add Notes</button> -->

                                </div>

                                <div class="col-md-6">

                                    <div class="align-center hide loader pull-right m-r-20">

                                        <div class="preloader pl-size-sm">

                                            <div class="spinner-layer pl-teal">

                                                <div class="circle-clipper left">

                                                    <div class="circle"></div>

                                                </div>

                                                <div class="circle-clipper right">



                                                    <div class="circle"></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <button type="submit" class="btn bg-red btn-lg waves-effect pull-right"

                                        id="submit_btn">CREATE USER</button>





                                    @php

                                        

                                        $notes = old('notes');

                                        $count = 0;

                                        

                                    @endphp





                                    <div class="modal fade" id="myModal" role="dialog">

                                        <div class="modal-dialog">

                                            <!-- Modal content-->

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close"

                                                        data-dismiss="modal">&times;</button>

                                                    <h4 class="modal-title">Add Notes</h4>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="fieldsWrap">



                                                        @if ($notes != '')

                                                            @foreach ($notes as $note)

                                                            @php $count++; @endphp

                                                            <div class="row">

                                                                <div class="col-md-10">

                                                                    <textarea class="addnote_area" name="notes[]" id="" cols="55" rows="2">{{ $note }}</textarea>

                                                                </div>

                                                                <div class="col-md-2">

                                                                    @if ($count != 1)

                                                                        <button class="rem" type="button"

                                                                            title="click to remove"

                                                                            style="margin:9px;border:none ;background-colo:#F44336;color:white;border-radius:4px">

                                                                            <i class="fa fa-remove"

                                                                                style="font-size: 15px;color:white;padding:5px"></i>

                                                                        </button>

                                                                    @endif

                                                                </div>

                                                            </div>

                                                            @endforeach

                                                        @else 

                                                        <div class="row">

                                                            <div class="col-md-10">

                                                                <textarea class="addnote_area" name="notes[]" id="" cols="55" rows="2"></textarea>

                                                            </div>

                                                            <div class="col-md-2">

                                                                

                                                            </div>

                                                        </div>

                                                        @endif



                                                    </div>

                                                </div>



                                                <div class="modal-footer">

                                                    {{-- <button type="button" class ="addField" id="addfield1" style="margin:17px;border:none ;background-color:green;color:white;border-radius:4px"> <i class="fa fa-plus" style="font-size: 15px;color:white;padding:5px;height: 35px;"></i>Add New Note</button> --}}

                                                    <button type="button" class="addField" id="addfield1"

                                                        style="margin:17px;border:none ;background-color:#4CAF50;color:white;border-radius:4px;padding: 3px;padding-left: 15px;padding-right: 15px;height: 35px;"><i

                                                            class="fa fa-plus"

                                                            style="font-size: 15px;color:white;padding:5px"></i>Add New

                                                        Note</button>

                                                       

                                                    <button type="button" class="" id="savenote" data-dismiss="modal"

                                                        style="margin:17px;border:none ;background-color:#F44336;color:white;border-radius:4px;padding: 3px;padding-left: 15px;padding-right: 15px;height: 35px;">Save</button>

                                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection



@section('extra-script')







@endsection

