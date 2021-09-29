@extends('index')



@section('title')



@endsection



@section('extra-css')



@endsection



@section('content')

    <div class="container-fluid">

        <div class="block-header">

            <h2>EMPLOYEES</h2>

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

                                    <th scope="col">Name</th>

                                    <th scope="col">Email</th>

                                    <th scope="col">Role</th>

                                    <th scope="col">Username</th>

                                    <th scope="col">Department</th>

                                    <th scope="col">Designation</th>

                                    <th scope="col">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    @php $sr_no = 1; @endphp

                                    @foreach ($employees as $index => $employee)

                                <tr> 

                                    <th scope="row">{{ $sr_no++ }}</th>

                                    <td>{{ $employee->first_name }}</td>

                                    <td>{{ $employee->personal_email_address }}</td>

                                    <td>@php
                                        if($employee->role == 0){
                                            echo "Admin";
                                        }elseif($employee->role == 1){
                                             echo "Hr";
                                        }else{
                                             echo "Employee";
                                        }
                                       @endphp</td>

                                    <td>{{ $employee->username }}</td>

                                    <td>{{ $employee->department_name }}</td>

                                    <td>{{ $employee->designation_name }}</td>

                                    <td>
                                      
                                        {{-- <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
      
                                            <div class="dropdown-menu">
                                                <a href="{{url('/products/'.$p->id.'/edit?section=')}}@php echo $_GET['section']; @endphp" class="dropdown-item"><button class="btn btn-rounded btn-outline-info btn-st">Edit</button></a>
                                             
                                                <form style="margin-left: 24px;" action="
                                                {{url('/products/'.$p->id.'?section=')}}@php echo $_GET['section']; @endphp" method="post">
                                                {!! csrf_field() !!} 
                                                {{Method_field('DELETE')}}
                                                    <button type="submit" id="delete-product-btn" class="btn btn-rounded btn-outline-info btn-st" onClick="return confirm('Are you really want to delete this product.)" >Delete</button>
                                                </form>
                                                
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                        <div class="col-sm-12">
                                       <div class="col-sm-12 employee_listing">
                                        <input type="checkbox" class='toggle-class' data-id="{{$employee->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled"  
                                        {{$employee->status==true ?'checked':'' }} >
                                       
                                    </div>
                                    <div class="col-sm-12 employee_listing">
                                        <a href="{{ route('editEmployee', ['id' => $employee->id]) }}" class="btn btn-info btn-sm edit_btn">Edit</a>
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                       

                                       
                                    </div>
                                    <div class="col-sm-12 employee_listing">
                                        <a href="{{ route('deleteEmployee', ['id' => $employee->id]) }}" id="link" class="btn btn-danger btn-sm delete_btn" onclick="return confirm('Are you really want to delete it.')">Delete</a> 
                                    </div>
                                    </div>
                                </div>
                                            
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

