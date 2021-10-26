@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>UPDATE APPLIED LEAVES</h2>
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


                        <form id="apply_leave_form" method="post" action="{{ route('update_leaves', ['id' => $leaves->id]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="required">From</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="from_date" class="form-control"
                                                placeholder="Select date" value="{{config('constants.tomorrow')}}">
                                        </div>

                                        <span class="text-danger">@error('from_date')
                                            {{ $message }}
                                        @enderror</span>
                                        {{-- <div class="custome_errors1"></div> --}}
                                    </div>
                                </div>

                                <div class="col-md-6 pull-right">
                                    <label for="" class="required">To</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="to_date" class="form-control"
                                                placeholder="Select date" value="{{config('constants.tomorrow')}}">
                                        </div>
                                        <span class="text-danger">@error('to_date')
                                            {{ $message }}
                                        @enderror</span>
                                        {{-- <div class="custome_errors1"></div> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                            <div class="col-md-6">
                                <label for="" class="required">No of days</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="no_of_days" class="form-control"
                                            placeholder="No of days you want to take leave" value="{{ $leaves->number_of_days }}">
                                    </div>
                                    <span class="text-danger">@error('no_of_days')

                                        {{ $message }}

                                    @enderror</span>
                                   
                                </div>
                            </div>
                            </div> --}}

                            

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="required">Reason</label>
                                    <div class="form-group">
                                    <textarea  name="reason" id="" rows="6" style = "width:100%" value = "{{ $leaves->reason }}"></textarea>
                                        {{-- <div class="custome_errors1"></div> --}}
                                    </div>
                                    <span class="text-danger">@error('reason')
                                        {{ $message }}
                                    @enderror</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style = "text-align:center">
                            <button type="submit" class="btn bg-red btn-lg waves-effect " id="submit_btn">Update</button>
                        </div>
                    </div>
                            
                            {{-- @method('PUT') --}}

                        </form>
                        {{-- @if (session()->has('status'))
                            <div class="alert- alert-success mt-3">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-script')



@endsection
