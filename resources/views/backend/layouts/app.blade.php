<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('asset/css/style-responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('asset/css/font.css')}}" type="text/css" />
    <link href="{{asset('asset/css/font-awesome.css')}}" rel="stylesheet">
    <script src="{{asset('asset/js/jquery2.0.3.min.js')}}"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript">
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
