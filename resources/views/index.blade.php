<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Welcome To Trigvent-HRMS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    

    <!-- Bootstrap Core Css -->
    @section('css')
        {{ Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap.css') }}
        {{ Html::style('public/bsbmd/plugins/node-waves/waves.css') }}
        {{ Html::style('public/bsbmd/plugins/animate-css/animate.css') }}
        {{ Html::style('public/bsbmd/plugins/morrisjs/morris.css') }}
        {{ Html::style('public/bsbmd/css/style.css') }}
        {{ Html::style('public/bsbmd/css/themes/all-themes.css') }}
        {{ Html::style('public/bsbmd/plugins/bootstrap-select/css/bootstrap-select.css') }}
        {{ Html::style('public/bsbmd/css/my.css') }}
        {{ Html::style('public/bsbmd/css/select2.min.css') }}

        
        {{-- {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap.min.css')}}
        {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.css')}}
        {{Html::style('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.min.css')}}  --}}

         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    @show

    @yield('extra-css')
</head>

<body class="theme-red">
    @include('layouts.partials.loader')
    <div class="overlay"></div>
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <section class="content">
        @yield('content')
    </section>

    @section('script')
        {{Html::script('public/bsbmd/plugins/jquery/jquery.min.js')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/js/bootstrap.js')}}
        
        {{-- {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.min.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.css')}}
        {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap-theme.min.css')}} --}}
        {{Html::script('public/bsbmd/plugins/bootstrap-select/js/bootstrap-select.js')}}
        {{Html::script('public/bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
        {{Html::script('public/bsbmd/plugins/node-waves/waves.js')}} 
        
        {{Html::script('public/bsbmd/js/select2.min.js')}} 
        {{Html::script('public/js/my.js?v=12')}} 
         
       

    @show    
    @yield('extra-script')
    @section('script-botto')
        {{Html::script('public/bsbmd/js/admin.js')}}
        {{Html::script('public/bsbmd/js/demo.js')}}
        {{-- {{Html::script('public/bsbmd/plugins/bootstrap/css/bootstrap.css.map')}} --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/form-validation.js')}}  --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/editors.js')}} --}}
        {{Html::script('public/bsbmd/plugins/jquery-steps/jquery.steps.min.js')}}
        {{Html::script('public/bsbmd/plugins/jquery-validation/jquery.validate.js')}}
        
        {{Html::script('public/bsbmd/js/pages/forms/form-wizard.js')}}
        {{-- {{Html::script('public/js/my.js')}}  --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/basic-form-elements.js')}} --}}
        {{-- {{Html::script('public/bsbmd/js/pages/forms/advanced-form-elements.js')}} --}}
        {{-- {{Html::script('public/bsbmd/plugins/jquery-steps/jquery.steps.min.js')} --}}
        
    @show
</body>
     
</html>