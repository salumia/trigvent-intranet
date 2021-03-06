@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT EMPLOYEE DETAILS</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form id="edit_employee_form" method="post" action="{{ route('updateEmployee', ['id' => $employee->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            
                            
                            {{-- @method('PUT') --}}

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
                                                placeholder="Enter First Name" value="{{ $employee->first_name }}">
                                        </div>
                                        <div class="custome_errors1"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="">Last Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Enter Last Name" value="{{ $employee->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="">Father's Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="father_name" class="form-control"
                                                placeholder="Enter Father Name" value="{{ $employee->father_name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="required">Date of Birth</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" onkeypress="return false;" name="dob" class="form-control" placeholder="Select D.O.B"
                                                value="{{ $employee->dob }}">
                                        </div>
                                        <div class="custome_errors2"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="required">Gender</label>
                                    <div class="form-group m-t-10">
                                        <span class="">
                                            <input type="radio" class="with-gap" id="ig_radio_m"
                                                {{ $employee->gender == 'male' ? 'checked' : '' }} value="male"
                                                name="gender" value="male">
                                            <label for="ig_radio_m">Male</label>
                                        </span>
                                        <span class="m-l-10">
                                            <input type="radio" class="with-gap" id="ig_radio_f"
                                                {{ $employee->gender == 'female' ? 'checked' : '' }} value="female"
                                                name="gender" value="female">
                                            <label for="ig_radio_f">Female</label>
                                        </span>
                                        <div class="custome_errors3 text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Image</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="image" class="form-control"
                                                value="{{ $employee->image }}">
                                           
                                        </div>
                                        <span class="text-danger">@error('image')
                                            {{ $message }}
                                        @enderror</span>
                                    </div>
                                    @if ($employee->image)
                                    <img src="{{ url('/public/employee-images/' . $employee->image) }}"
                                        alt="image"   id="emp_image"
                                        style="margin-bottom:20px; margin-top:-10px;">
                                @endif
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
                                                value="{{ $employee->personal_email_address }}">

                                        </div>
                                        <span class="custome_errors4 text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="">Official Email Address </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="official_email_address" class="form-control"
                                                placeholder="Enter Email Address"
                                                value="{{ $employee->official_email_address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="required">Mobile Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="mobile_number" class="form-control"
                                                placeholder="Enter Mobile Number" value="{{ $employee->mobile_no }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="">Alternate Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="alternate_number" class="form-control"
                                                placeholder="Enter Alternate Number" value="{{ $employee->alternate_no }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="">Permanent Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Enter Address" value="{{ $employee->address }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="">Temporary Address</label>
                                    <div class="form-group">
                                       <div class="form-line">
                                            <input type="text" name="temporary_address" class="form-control"
                                                placeholder="Enter Address" value="{{ $employee->temporary_address }}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                 <div class="col-md-4">    
                                    <label for="" class="">State</label>
                                    <div class="form-group">
                                        <select name="selectstate2"  id="selectstate2" class="selectpicker" value="{{ old('allState') }}">
                                            <option value="">Select State</option>
                                            @foreach($allState as $st)
                                            <option {{ $st->state_code == $employee->state ? 'selected' : '' }} value="{{ $st->state_code }}">{{ $st->state_name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>

                              
                           

                               <div class="col-md-4">
                                      <label for="" class="">City</label>
                                            <div class="form-group"  >
                                                <input type="hidden" id="city_id" value="{{ $employee->city }}">
                                                <select name="selectcity2" id="select_cities2" class="selectpicker" value="{{ old('department') }}">
                                                    <option value="">Select City</option>
                                                    @foreach($city as $ct)
                                                  
                                                    <option {{ $ct->id == $employee->city ? 'selected' : '' }} value="{{ $employee->city }}">{{ $ct->city_name }}</option>
                                                   @endforeach
                                                   
                                                </select>
                                            </div>
                                   </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="sub_section_heading">
                                    <h4><b><u>Official Details</u> </b></h4>
                                    </p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="" class="required">Department</label>
                                    <div class="form-group">
        
                                    
                                        <select name="department" class="selectpicker"  id="department2"value="">
                                        
                                            <option value="">select department</option>
                                            @foreach ($departments as $department)
                                                <option {{ $department->id == $employee->department_id ? 'selected' : '' }}
                                                    value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- {{$dep->department_name == $employee->department ? "selected" : ""}} --}}
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="required">Designation</label>
                                    <div class="form-group">
                                        <input type="hidden" id="desig_id" value="{{ $employee->designation_id }}">
                                        <select name="designation" class="form-control " id="designation2" class="selectpicker" name="designation" value="">
                                            <option value="">select designation</option>
                                            @foreach ($designations as $designation)
                                                <option {{ $designation->id == $employee->designation_id ? 'selected' : '' }}
                                                    value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="required">Joining Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" onkeypress="return false;" name="joining_date" class="form-control"
                                                placeholder="Select Joining Date" value="{{ $employee->joining_date }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               
                                    <div class="col-md-4">
    
                                        <label for="" class="">Skype ID</label>
    
                                        <div class="form-group">
    
                                            <div class="form-line">
    
                                                <input type="text" name="skype_id" class="form-control"
    
                                                    placeholder="Enter Skype id" value="{{ $employee->skype_id }}">
    
                                            </div>
    
    
    
                                        </div>
    
                                    </div>
                               
                                <div class="col-md-4">
                                    <label for="" class="required">User Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" readonly name="username" class="form-control"
                                                placeholder="Select Joining Date" value="{{ $employee->username }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="">Emp. Login Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Leave Blank For Same Password" value="">
                                                {{-- <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-info-circle" title = "Fill it if you want to change the password" style = "color:red"></i></span> 
                                                  </div> --}}
  
                                        </div>
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="">Relieving Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="relieving_date" class="form-control "
                                                placeholder="" value="">           
                                        </div>                                   
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="sub_section_heading">
                                    <h4><b><u>Miscellaneous</u> </b></h4>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <label for="" class="required">Miscellaneous</label>
                                    <div class="form-group">
        
                                        <select name="misscellaneous" class="selectpicker"  id="misscellaneous" value="">
                                        
                                             <option value="0">Select Item</option>                                            
                                          
                                          
                                        </select>
                                    </div>
                            </div> --}}
                            <div class="col-md-4 locker_key_class" >
                                <label for="" class="" name ="" >Drawer Key</label>
                                    <div class="form-group">
                                        <div class="form-line">                                      
                                            <input type="input" id = "drawer_key" name="Drawer_key" class="form-control "
                                                placeholder="" value="{{ is_null($miscellaneous) ? '' : $miscellaneous->value }}">  
                                                                                                                                                                                         
                                        </div>   
                                        {{-- <input type="hidden" name="drawer_return" value="0">  --}}
                                        <input class="filled-in" type="checkbox" id="locker_key_return" name="drawer_return1" value="1"  {{ is_null($miscellaneous3)  ||  $miscellaneous3->value !=1  ? '' : 'checked'  }} >
                                            <label class="form-check-label" style = "margin-left: 216px;top:-33px" for="locker_key_return">Is return</label>                    
                                            <input type="hidden" name="drawer_return" id="locker_key_return" value="0" > 
                                    </div>
                            </div>
                            <div class="col-md-4 locker_key_class" >
                                <label for="" class=""  name ="" >ID card</label>
                                    {{-- <div class="form-group"> --}}
                                        {{-- <div class="form-line">  --}}
                                            <div class="form-check ">
                                                    
                                                <input class="filled-in" type="checkbox" id="id_card_return1" name="id_card_return1" value="1"  {{ is_null($miscellaneous4)  ||  $miscellaneous4->value !=1  ? '' : 'checked'  }}>                                        
                                                {{-- <input type="hidden" name="id_card_return" > --}}    
                                                <label class="form-check-label" for="id_card_return1">Is return</label>       
                                                <input type="hidden" name="id_card_return" id="id_card_return" value="0">     
                                            </div>                                       
                            </div>                        
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
                                                placeholder="Enter Account Name"
                                                value="{{ $employee->bank_account_name }}">
                                        </div>
                                    </div>
                                </div>	
                                  <div class="col-md-4">
                                    <label for="">Bank Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bank_name" class="form-control"
                                                placeholder="Enter Account Name"
                                                value="{{ $employee->bank_name }}">
                                        </div>
                                    </div>
                                </div>										
								
                                <div class="col-md-4">
                                    <label for="">Account Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bank_account_number" class="form-control"
                                                placeholder="Enter Account Number"
                                                value="{{ $employee->bank_account_number }}">
                                        </div>
                                    </div>
                                </div>	
								</div>                                 
								<div class="row">
                                <div class="col-md-4">
                                    <label for="">IFSC code</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bank_ifsc_code" class="form-control"
                                                placeholder="Enter Account Name" value="{{ $employee->bank_ifsc_code }}">
                                        </div>
                                    </div>
                                </div>     
								</div>
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="align-center font-bold align-left" id="response"></div>
                                    <button type="button" class="btn btn-info btn-lg waves-effect pull-left" id="viewNote" data-toggle="modal" data-target="#myModal">View Notes</button>
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
                                    <button type="submit" class="btn bg-red btn-lg waves-effect pull-right" id="submit_btn">Update</button>

                                    @php
                                        
                                        $notes = json_decode($employee->notes); 
                                        $count = 0;
                                        
                                    @endphp

                                    {{-- ------------------here is model start-------------------- --}}

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
                                                        @foreach ($notes as $note)
                                                            @php $count++; @endphp
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <textarea class = "addnote_area" name="notes[]" id="" cols="55" rows="2">{{ $note }}</textarea>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    @if ($count != 1)
                                                                        <button class="rem" type="button"
                                                                            title="click to remove"
                                                                            style="margin:9px;border:none ;background-color:red;color:white;border-radius:4px">
                                                                            <i class="fa fa-remove"
                                                                                style="font-size: 15px;color:white;padding:5px"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="button" class ="addField" id="addfield1" style="margin:17px;border:none ;background-color:green;color:white;border-radius:4px"> <i class="fa fa-plus" style="font-size: 15px;color:white;padding:5px"></i>Add New Note</button> --}}
                                                    <button type="button" class="addField" id="addfield1"
                                                        style="margin:17px;border:none ;background-color:green;color:white;border-radius:4px;padding: 3px;padding-left: 15px;padding-right: 15px;height: 35px;"><i class="fa fa-plus" style="font-size: 15px;color:white;padding:5px"></i>Add
                                                        New Note</button>
                                                    <button type="button" id="updatenote" data-dismiss="modal"
                                                        style="margin:17px;border:none ;background-color:rgb(55, 21, 248);color:white;border-radius:4px;padding: 3px;padding-left: 15px;padding-right: 15px;height: 35px;">Update
                                                        Notes</button>
                                                    {{-- <button type="button" class="btn btn-default" id="updatenote" data-dismiss="modal" >Update Notes</button> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button type="button" class="btn btn-info btn-lg waves-effect pull-left" id="viewNote"
                                    data-toggle="modal" data-target="#myModal">View Notes</button>
                                <button type="submit" class="btn bg-red btn-lg waves-effect pull-right" id="submit_btn"
                                    style="margin:21">Update</button> --}}
                            </div>
                        </form>
                        @if (session()->has('status'))
                            <div class="alert- alert-success mt-3">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-script')



@endsection
