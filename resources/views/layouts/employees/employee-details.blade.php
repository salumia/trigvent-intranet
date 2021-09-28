@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection
@section('content')
    {{-- <section class="content"> --}}
    <div class="container-fluid">
        <div class="block-header">
            <h2> PROFILE</h2>
        </div>
        <div class="row clearfix ">

            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div>
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body" style="padding: 20px;">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                {{-- <img src="{{Auth::user()->image  }}" alt="Admin" class="rounded-circle" width="150"> --}}



                                                @if (Auth::user()->image)
                                                    <img src="{{ url('/public/employee-images/' . Auth::user()->image) }}"
                                                         alt="image" width="150" class="rounded-circle">

                                                @else
                                                    @if (Auth::user()->gender == 'male')
                                                        <img src="{{ url('/public/employee-images/avatar-male.png') }}"  
                                                            alt="Admin" class="rounded-circle" width="150">
                                                     @else
                                                    
                                                    <img src="{{ url('/public/employee-images/avatar-female.png') }}" 
                                                        alt="Admin" class="rounded-circle" width="150">
                                                        @endif
                                                @endif


                                                <div class="mt-3 " >
                                                    <h4 class=" capitalize">{{ Auth::user()->first_name }}
                                                        {{ Auth::user()->last_name }}
                                                    </h4>
                                                    <small>  Username : {{ Auth::user()->username }}</small>
                                                    <br>
                                                    <small  class="text-secondary capitalize " >  {{ $designation->designation_name }}</small>
                                                   
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3" style="padding-left: 20px; padding-top: 7px; padding-bottom:33px;">

                                        <u>
                                            <h4 style="margin-bottom: 25px; ">Official Details</h4>
                                        </u>
                                        {{-- <p class="sub_section_heading first">
                                                <h4 class=" heading"><b><u>Official Details</u> </b></h4>
                                                </p> --}}
                                        <h6 class="mb-0">Department</h6>
                                        <span class=" capitalize">
                                            {{ $department->department_name }}</span>
                                        <hr>

                                        <h6 class="mb-0">Designation</h6>
                                        <span class=" capitalize">
                                            {{ $designation->designation_name }}</span>
                                        <hr>

                                        <h6 class="mb-0">Joining Date</h6>
                                        <span class="___class_+?22___" >{{ Auth::user()->joining_date }}</span>

                                    </div>
                                    <div class="card mt-3" style="padding-left: 20px; padding-top: 7px; padding-bottom:33px;">

                                        {{-- <ul class="list-group list-group-flush"> --}}

                                        <u>
                                            <h4 style="margin-bottom: 25px; ">Bank Details</h4>
                                        </u>

                                        <h6 class="mb-0">Account Name</h6>
                                        <span class=" capitalize">
                                            {{ Auth::user()->bank_account_name != '' ? Auth::user()->bank_account_name : 'NA' }}</span>
                                        <hr>

                                        <h6 class="mb-0">Account Number</h6>
                                        <span class=" capitalize">
                                            {{ Auth::user()->bank_account_number != '' ? Auth::user()->bank_account_number : 'NA' }}</span>
                                        <hr>

                                        <h6 class="mb-0">IFSC code</h6>
                                        <span class="___class_+?29___">
                                            {{ Auth::user()->bank_ifsc_code != '' ? Auth::user()->bank_ifsc_code : 'NA' }}</span>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body" style="padding: 20px;">
                                            <div class="col-md-12">
                                                <p class="sub_section_heading first">
                                                <h4 class=" heading"><b><u>Personal Details</u> </b></h4>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Full Name</h6>
                                                    <span class="u-info capitalize">{{ Auth::user()->first_name }}
                                                        {{ Auth::user()->last_name }}</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Father Name</h6>
                                                    <span class="u-info capitalize">
                                                        {{ Auth::user()->father_name != '' ? Auth::user()->father_name : 'NA' }}</span>
                                                </div>
                                            </div>
                                            <hr class="m-t-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Date of Birth</h6>
                                                    <span class="u-info">{{ Auth::user()->dob }}</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Gender</h6>
                                                    <span class="u-info capitalize">{{ Auth::user()->gender }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body" style="padding: 20px;">
                                            <div class="col-md-12">
                                                <p class="sub_section_heading first">
                                                <h4 class=" heading"><b><u>Contact Details</u> </b></h4>
                                                </p>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Personal Email Address</h6>
                                                    <span
                                                        class="u-info">{{ Auth::user()->personal_email_address }}</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Official Email Address</h6>
                                                    <span
                                                        class="u-info">{{ Auth::user()->official_email_address != '' ? Auth::user()->official_email_address : 'NA' }}</span>
                                                </div>
                                            </div>
                                            <hr class="m-t-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Mobile Number</h6>
                                                    <span class="u-info">{{ Auth::user()->mobile_no }}</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Alternate Number</h6>
                                                    <span class="u-info">
                                                        {{ Auth::user()->alternate_no != '' ? Auth::user()->alternate_no : 'NA' }}</span>
                                                </div>
                                            </div>
                                            <hr class="m-t-0">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h6 class="mb-0">Address</h6>
                                                    <span class="u-info capitalize">
                                                        {{ Auth::user()->address != '' ? Auth::user()->address : 'NA' }}</span>
                                                </div>
                                            </div>
                                            <hr class="m-t-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">City</h6>
                                                    <span class="u-info">
                                                        {{ Auth::user()->city != '' ? Auth::user()->city : 'NA' }}</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">State</h6>
                                                    <span class="u-info">
                                                        {{ Auth::user()->state != '' ? Auth::user()->state : 'NA' }}</span>
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
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('extra-script')



@endsection
