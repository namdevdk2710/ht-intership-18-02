<!DOCTYPE html>
<head>
    <title>Visitors an Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('asset/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('asset/css/font.css')}}" type="text/css"/>
    <link href="{{asset('asset/css/font-awesome.css')}}" rel="stylesheet">
    <script src="{{asset('asset/js/jquery2.0.3.min.js')}}"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>
<body>
<section id="container">
    @include('backend.layouts.headerbar')
    @include('backend.layouts.sidebar')

    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>
</section>
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<script src="{{asset('asset/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('asset/js/scripts.js')}}"></script>
<script src="{{asset('asset/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('asset/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('asset/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
