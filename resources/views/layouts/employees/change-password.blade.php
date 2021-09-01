@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>CHANGE PASSWORD</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        @if (session()->has('error'))
                        <div class="alert bg-red alert-dismissible" style="border-radius:5px;" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <span style="color:white; margin:20px; ">{{ session('error') }}</span>
                      </div>
                        @endif
                        @if (session()->has('status'))
                        <div class="alert bg-green alert-dismissible" style="border-radius:5px;" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <span style="color:white; margin:20px; ">{{ session('status') }}</span>
                      </div>
                        @endif
                        <form id="change_password_form" action="{{ route('changePassword') }}" method="POST">
                            @csrf
                            <div class="row">
                              <div class="col-md-12">
                                <label for="" class="required" aria-required="true">Current Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="currentpasssword" class="form-control" placeholder="Current Password" value="">
                                    </div>
                                    <div class="custome_errors1"></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <label for="" class="required" aria-required="true">New Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="newpassword" class="form-control" placeholder="New Password" value="">
                                    </div>
                                    <div class="custome_errors2"></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <label for="" class="required" aria-required="true">Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" value="">
                                    </div>
                                    <div class="custome_errors3"></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                
                                <div class="form-group" style="text-align: end ; color:#F44336">
                                   
                                      <button type="submit" class="btn btn-danger btn-lg text-center">Change
                                        Password</button>
                                   
                                   
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
