<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link rel="stylesheet" href="{{asset('/admin-template/css/bootstrap.min.css')}}">
    <link href="{{asset('/admin-template/css/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('/admin-template/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('/admin-template/css/mystyle.css')}}" rel="stylesheet"/>
    <script src="{{asset('admin-template/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main login--wrapper">
        <h2>Sign In Now</h2>
        {!! Form::open(['url' => '#']) !!}
        {!! Form::email('email', null, ['class' => 'ggg','placeholder' => 'E-MAIL','required'=>'true']) !!}
        {!! Form::password('password', ['class' => 'ggg', 'placeholder'=>'PASSWORD', 'required'=>'true']) !!}
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
<script src="{{asset('admin-template/js/bootstrap.js')}}"></script>
<script src="{{asset('admin-template/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin-template/js/scripts.js')}}"></script>
<script src="{{asset('admin-template/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin-template/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin-template/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
