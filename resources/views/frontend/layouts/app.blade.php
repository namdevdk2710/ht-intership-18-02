<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donantion</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{asset('asset/fe/css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{asset('asset/fe/css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('asset/fe/css/fontawesome-all.css')}}">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //Web-Fonts -->
    <script src="{{asset('asset/fe/js/jquery-2.2.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<body>
    @include('frontend.layouts.header')
    <div class="inner-banner-w3ls">
        <div class="container">

        </div>
        <!-- //banner 2 -->
    </div>
    @section('content')

    @show
    @include('frontend.layouts.footer')

    <!-- Js files -->
    <!-- JavaScript -->
    <script src="{{asset('asset/fe/js/jquery-2.2.3.min.js')}}"></script>
    <!-- Default-JavaScript-File -->

    <!-- banner slider -->
    <script src="{{asset('asset/fe/js/responsiveslides.min.js')}}"></script>
    <script>
    $(function() {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
            namespace: "callbacks",
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
    </script>
    <!-- //banner slider -->

    <!-- fixed navigation -->
    <script src="{{asset('asset/fe/js/fixed-nav.js')}}"></script>
    <!-- //fixed navigation -->

    <!-- move-top -->
    <script src="{{asset('asset/fe/js/move-top.js')}}"></script>
    <!-- easing -->
    <script src="{{asset('asset/fe/js/easing.js')}}"></script>
    <!--  necessary snippets for few javascript files -->
    <script src="{{asset('asset/fe/js/medic.js')}}"></script>

    <script src="{{asset('asset/fe/js/bootstrap.js')}}"></script>
    <!-- Necessary-JavaScript-File-For-Bootstrap -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript">
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- //Js files -->
</body>

</html>
