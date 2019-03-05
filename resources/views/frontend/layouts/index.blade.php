<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donation</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- // Meta Tags -->
    <!--booststrap-->
    <link href="{{asset('asset/fe/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <!-- font-awesome icons -->
    <link href="{{asset('asset/fe/css/fontawesome-all.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <link href="{{asset('asset/fe/css/owl.carousel.css')}}" rel="stylesheet">
    <!--stylesheets-->
    <link href="{{asset('asset/fe/css/style.css')}}" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
</head>

<body>
    @include('frontend.layouts.header')
    @include('frontend.layouts.banner')
    @include('frontend.layouts.footer')
    @include('frontend.calendar')
    <!--js working-->
    <script src="{{asset('asset/fe/js/jquery.min.js')}}"></script>
    <!--//js working-->
    <!-- requried-jsfiles-for owl -->
    <script src="{{asset('asset/fe/js/owl.carousel.js')}}"></script>
    <script>
    $(document).ready(function() {
        $("#owl-demo2").owlCarousel({
            items: 1,
            lazyLoad: false,
            autoPlay: true,
            navigation: false,
            navigationText: false,
            pagination: true,
        });
    });
    </script>
    <!-- //requried-jsfiles-for owl -->


    <!-- Slider script -->
    <script src="{{asset('asset/fe/js/responsiveslides.min.js')}}"></script>
    <script>
    // You can also use "$(window).load(function() {"
    $(function() {
        $("#slider").responsiveSlides({
            auto: true,
            nav: true,
            manualControls: '#slider3-pager',
        });
    });
    </script>
    <!-- stats -->
    <script src="{{asset('asset/fe/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('asset/fe/js/jquery.countup.js')}}"></script>
    <script>
    $('.counter-agileits-w3layouts').countUp();
    </script>
    <!-- //stats -->

    <!-- smooth scrolling -->
    <script type="text/javascript" src="{{asset('asset/fe/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/fe/js/easing.js')}}"></script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
    $(document).ready(function() {
        /*
        	var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear'
        	};
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
    </script>
    <!-- //here ends scrolling icon -->
    <!-- //smooth scrolling -->
    <!-- scrolling script -->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
    <!-- //scrolling script -->

    <!--bootstrap working-->
    <script src="{{asset('asset/fe/js/bootstrap.min.js')}}"></script>
    <!-- //bootstrap working-->
</body>

</html>
