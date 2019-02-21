<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/asset/css/bootstrap.min.css')}}">
    <link href="{{asset('/asset/css/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('/asset/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('/asset/css/mystyle.css')}}" rel="stylesheet"/>
    <script src="{{asset('asset/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main login--wrapper">
        <h2>Sign In Now</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class=''>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        @if (session('login-error'))
       <div class="alert alert-danger" role="alert">
           {{ session('login-error') }}
       </div>
         @endif
        {!! Form::open(['url' => '#']) !!}
        {!! Form::email('email', null, ['class' => 'ggg','placeholder' => 'E-MAIL','required'=>'true']) !!}
        {!! Form::password('password', ['class' => 'ggg', 'placeholder'=>'PASSWORD', 'required'=>'true', 'autocomplete'=>'true']) !!}
        <span>
            {!! Form::checkbox('name', '1', null,  ['id' => 'name']) !!}
            Remember Me</span>
        <h6><a href="#">Forgot Password?</a></h6>
        <div class="clearfix"></div>
        {!! Form::submit('Submit', ['value' => 'Sign In']) !!}
        {!! Form::close() !!}
        <p>Don't Have an Account ?<a href="#">Create an account</a></p>
    </div>
</div>
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<script src="{{asset('asset/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('asset/js/scripts.js')}}"></script>
<script src="{{asset('asset/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('asset/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('asset/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
