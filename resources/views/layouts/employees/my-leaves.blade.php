@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>MY LEAVES</h2>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="message"></div>
                <div class="card">

                    {{-- @if (session()->has('status'))

                        <div class="alert- alert-success mt-3">

                            {{ session('status') }}

                        </div>

                    @endif 
                
                    @if (session()->has('status'))

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
                                    <th scope="col">Apply on</th>
                                    <th scope="col">No. of days</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Approved/Rejected by</th>
                                    <th scope="col">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php $sr_no = 1; @endphp
                                    @foreach ($empleaves as $index => $empleave)
                                <tr> 

                                    <th scope="row">{{ $sr_no++ }}</th>

                                    <td>@php $created_at = explode(' ',$empleave->created_at);
                                        $created_at = $created_at[0];
                                         @endphp
                                        {{  $created_at }}</td>

                                    <td>{{ $empleave->number_of_days }}</td>

                                 
                                   <td> @php 
                                   
                                    if($empleave->status == 0){
                                        echo "Pending";
                                    }elseif($empleave->status == 1){
                                        echo "Approved";
                                    }elseif($empleave->status == 2){
                                        echo "Rejected";
                                    }
                                    @endphp 
                                    </td>

                                    <td>{{ $empleave->approved_by }}</td>

                                    

                                    <td>
                                        
                                        @if($empleave->status == 0)
                                            <div class="row">
                                        <div class="col-sm-12">
                                     
                                    <div class="col-sm-4 employee_listing">
                                        <a href="{{ route('edit_leaves', ['id' => $empleave->id]) }}" class="btn btn-info btn-sm edit_btn">Edit</a>
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    </div>

                                   <div class="col-sm-4 employee_listing">
                                        <a href="{{ route('delete_leave', ['id' => $empleave->id]) }}" id="link" class="btn btn-danger btn-sm delete_btn" onclick="return confirm('Are you really want to delete it.')">Delete</a> 
                                    </div>
                                   
                                  
                                    </div>
                                </div>
                                @endif
                                        
                                 
                                    </td>

                                </tr>

                                @endforeach



                                </tr>





                            </tbody>

                        </table>

                    </div>



                </div>

            </div>



        </div>

    </div>



@endsection

@section('extra-script')

@endsection

