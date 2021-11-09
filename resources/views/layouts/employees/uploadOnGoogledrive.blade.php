@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>UPLOAD FILES</h2>
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


                        <form id="" method="post" action="{{route('test')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="required">Upload File On Google Drive : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="upload_file" class="form-control"
                                                placeholder="" value="">

                                            <input type="hidden" name="emp_id" value={{$id}}>
                                                
                                        </div>
                                        <span class="text-danger">@error('')

                                            {{ $message }}

                                        @enderror</span>
                                       
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success ">Upload File</button>

                              
                            </div>

                        </form>


                        {{-- <form action="/" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                            <div class="dz-message">
                                <div class="drag-icon-cph">
                                    <i class="material-icons">touch_app</i>
                                </div>
                                <h3>Drop files here or click to upload.</h3> --}}
                                {{-- <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> --}}
                            {{-- </div>                            
                        </form> --}}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-script')



@endsection
