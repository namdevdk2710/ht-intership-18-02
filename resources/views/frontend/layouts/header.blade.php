<!-- header -->
<header>
    <!-- top-bar -->
    <div class="top-bar py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 top-social-agile">
                    <div class="row">
                        <!-- social icons -->
                        <ul class="col-lg-4 col-6 top-right-info text-center">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="ml-3">
                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- //social icons -->
                        <div class="col-6 header-top_w3layouts pl-3 text-lg-left text-center">
                            <p class="text-white">
                                <i class="fas fa-map-marker-alt mr-2"></i>38 Cao Thắng, Đà Nẵng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 top-social-agile text-lg-right text-center">
                    <div class="row">
                        <div class="col-lg-7 col-6 top-w3layouts">
                            <p class="text-white">
                                <i class="far fa-envelope-open mr-2"></i>
                                <a href="" class="text-white">info@example.com</a>
                            </p>
                        </div>
                        <div class="col-lg-5 col-6 header-w3layouts pl-4 text-lg-left">
                            <p class="text-white">
                                <i class="fas fa-phone mr-2"></i>+ 76 25 88 340</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- //top-bar -->

<!-- header 2 -->
<div id="home">
    <!-- navigation -->
    <div class="main-top py-1">
        <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
            <div class="container">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand font-weight-bold font-italic" href="index.html">
                        <span>B</span>lood
                        <i class="fas fa-syringe"></i>
                    </a>
                </h1>
                <!-- //logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active mt-lg-0 mt-3">
                            <a class="nav-link" href="">Trang chủ
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="{{ route('requestBlood.getRegisterDonated') }}">
                                Đăng ký hiến máu
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="{{ route('requestBlood.getRegisterReceived') }}">
                                Đăng ký nhận máu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="appointment.html">Đối tác</a>
                        </li>
                        <li class="nav-item dropdown mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Thông tin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item scroll" href="">Nhật ký hiến/nhận</a>
                                <a class="dropdown-item" href="">Kết quả xét nghiệm</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Phản hồi</a>
                        </li>

                    </ul>
                    <!-- login -->
                    <div class="top-nav  mx-lg-4 my-lg-0 my-3 ">
                        @if(Auth::user())
                        <ul class="nav pull-right top-menu">
                            <!-- user login dropdown start-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img alt="" src="{{asset('asset/images/2.png')}}">
                                    <span class="username">{{Auth::user()->name }}</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended dropdown-login">
                                    <li>
                                        <a href="#"  data-toggle="modal"
                            data-target="#modalProfile"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"><i class="fa fa-key"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- user login dropdown end -->
                        </ul>
                        @else
                        <a href="#" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" data-toggle="modal"
                            data-target="#exampleModalCenter1">
                            <i class="fas fa-sign-in-alt mr-2"></i>Đăng nhập
                        </a>
                        @endif
                        <!-- //login -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @include('frontend.layouts.login')
    @include('frontend.layouts.register')
<!-- include('frontend.users.profile') -->
</div>
