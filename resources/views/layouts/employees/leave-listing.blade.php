@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2> LEAVES LISTING</h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="message"></div>
                <div class="card">

                    {{-- @if (session()->has('status'))

                        <div class="alert- alert-success mt-3">

                            {{ session('status') }}

                        </div>

                    @endif --}}



                    {{-- @if (session()->has('status'))

                    <div class="alert bg-green alert-dismissible " style="" role="alert">

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

                      <span style="color:white; margin:20px; ">{{ session('status') }}</span>

                  </div>

                    @endif --}}

                    <div class="body">



                        @if (session()->has('status'))

                        <div class="alert bg-green alert-dismissible" style="border-radius:5px;" role="alert">

                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

                          <span style="color:white; margin:20px; ">{{ session('status') }}</span>

                      </div>

                        @endif



                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">Sr.no</th>
                                    <th scope="col">Emp_Id</th>
                                    <th scope="col">Apply on</th>
                                    <th scope="col">No. of days</th>
                                    {{-- <th scope="col">Status</th> --}}
                                    {{-- <th scope="col">Approved by</th> --}}
                                    <th scope="col">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php $sr_no = 1; @endphp
                                    @foreach ($empleaves as $index => $empleave)
                                <tr> 

                                    <th scope="row">{{ $sr_no++ }}</th>

                                    <td>{{  $empleave->emp_id }}</td>

                                    <td>@php $created_at = explode(' ',$empleave->created_at);
                                    $created_at = $created_at[0];
                                     @endphp
                                        {{  $created_at }}</td>

                                    <td>{{ $empleave->number_of_days }}</td>

                                    {{-- <td>@php
                                        if($employee->role == 0){
                                            echo "Admin";
                                        }elseif($employee->role == 1){
                                             echo "Hr";
                                        }else{
                                             echo "Employee";
                                        }
                                       @endphp</td> --}}

                                    {{-- <td> @php 
                                    if($empleave->status == 0){
                                        echo "pending";
                                    }elseif($empleave->status == 1){
                                        echo "Approved";
                                    }elseif($empleave->status == 2){
                                        echo "Rejected";
                                    }
                                    @endphp </td> --}}

                                    {{-- <td>{{ $empleave->approved_by }}</td> --}}

                                    

                                    <td>
    
                                        <div class="row">
                                        <div class="col-sm-12">
                                       {{-- <div class="col-sm-12 employee_listing">
                                        <input type="checkbox" class='toggle-class' data-id="{{$employee->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled"  
                                        {{$employee->status==true ?'checked':'' }} > 
                                    </div> --}}
                                    
                                    {{-- <div class="col-sm-4 employee_listing">
                                        <a href="{{ route('edit_leaves', ['id' =>$empleave->id]) }}" class="btn btn-info btn-sm edit_btn">Edit</a>
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    </div>

                                   <div class="col-sm-4 employee_listing">
                                        <a href="{{ route('delete_leave', ['id' => $empleave->id]) }}" id="link" class="btn btn-danger btn-sm delete_btn" onclick="return confirm('Are you really want to delete it.')">Delete</a> 
                                    </div> --}}
                                   
                                 
                                  @if ($empleave->status == 0)
                                  <div class="col-sm-4 employee_listing_app">
                                    <a href="#" id="approveleave{{$empleave->id}}" class="btn btn-info btn-sm edit_btn approveleave">Approve</a>
                                    <input type="hidden" id="hiddenleaveid" class="hiddenleaveid" value="{{$empleave->id}}" >
                                    <input type="hidden" id="hiddenempid" class="hiddenempid" value="{{$empleave->emp_id}}" >
                                </div>
                                
                               <div class="col-sm-4 employee_listing_rej">
                                    <a href="#" id="rejectleave{{$empleave->id}}" class="btn btn-danger btn-sm delete_btn rejectleave"
                                         data-toggle="modal" data-target="#rejectLeavePopup" >Reject</a> 
                                    <input type="hidden" id="hiddenleaveid2" class="hiddenleaveid" value="{{$empleave->id}}" >
                                    <input type="hidden" id="hiddenleaveid2" class="hiddenempid" value="{{$empleave->emp_id}}" >
                                   
                                </div>
                                  @elseif($empleave->status == 1)
                                  <div class="col-sm-4 employee_listing" >
                                    {{-- <a href="#" id="approveleave" class="btn btn-info btn-sm edit_btn approveleave">Approve</a> --}}
                                    <span class ="btn btn-info">Approved</span>
                                    {{-- <input type="hidden" id="hiddenleaveid" class="hiddenleaveid" value="{{$empleave->id}}" > --}}
                                </div>
                                @else
                                <div class="col-sm-4 employee_listing">
                                    {{-- <a href="#" id="rejectleave" class="btn btn-danger btn-sm delete_btn rejectleave" >Reject</a>  --}}
                                    {{-- <input type="hidden" id="hiddenleaveid" class="hiddenleaveid" value="{{$empleave->id}}" > --}}
                                    <span class ="btn btn-danger">Rejected</span>
                                </div>
                                  @endif
                                   
                                  
                                    </div>
                                </div>
                                            
                                    </td>

                                </tr>

                                @endforeach



                                </tr>





                            </tbody>

                        </table>

{{-- ----------------------------------------modal start-------------------------------------- --}}

                    </div>
                </div>
            </div>
        </div>

    </div>

 <!-- Modal -->
 <div class="modal fade" id="rejectLeavePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Leave reject reason</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            {{-- <span aria-hidden="true">&times;</span> --}}
            
          </button>
        </div>
        <div class="modal-body">
            <textarea name="rejectreason" id="reject_reason" class="reject_reason" cols="60" rows="10" ></textarea>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary popup_close_reject_reason" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary popup_reject_reason" data-dismiss="modal">Save reason</button>
        </div>
      </div>
    </div>
  </div>
{{-- ----------------------------------------modal end-------------------------------------- --}}

@endsection

@section('extra-script')

@endsection

