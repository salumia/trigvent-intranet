@extends('auth.app')


@section('content')


    <form id="sign_in" role="form" method="POST" action="{{ route('authenticate') }}">
        {{ csrf_field() }}
        @csrf
        <div class="msg">Sign in to start your session</div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line {{ $errors->has('username') ? ' error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username"
                    required autofocus>
            </div>
            @if ($errors->has('username'))
                <label id="name-error" class="error" for="username">{{ $errors->first('username') }}</label>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line {{ $errors->has('password') ? ' error' : '' }}">
                <input type="password" value="FakePSW" id="myInput" class="form-control" name="password" placeholder="Password" required>
            </div>
            @if ($errors->has('password'))
                <label id="name-error" class="error" for="name">{{ $errors->first('password') }}</label>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8 p-t-5">
                <input class="form-check-input" type="checkbox" id="show_pass" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="show_pass">Show Password</label>
            </div>
            {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div> --}}
            <div class="col-xs-4">
                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
            </div>
        </div>
        <div class="login-response text-center text-danger">
            @if (session()->has('error'))
                <div class="login-response text-center text-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row m-t-15 m-b--20">
            <div class="col-xs-6 align-right">
                <a href="">Forgot Your Password?</a>
            </div>
        </div>
    </form>
    @push('head')
{{-- <script src="{{ asset('js/components/pizza.js')}}"></script> --}}
<script src="{{ asset('public/js/my.js')}}"></script>
@endpush

@endsection
<script src="{{ asset('js/my.js') }}"></script>
