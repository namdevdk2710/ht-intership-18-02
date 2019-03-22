<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <li  href=""class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </div>
</div>
<div class="single-w3l pb-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabmenu1" role="tabpanel">
                <div class="row inner_sec_info">
                    <!-- left side -->
                    <div class="col-lg-8 single-left">
                        @include('frontend.pages.introduce')
                        @include('frontend.pages.slogan')
                    </div>
                    <!-- //left side -->
                    @include('frontend.pages.menu')
                </div>
            </div>
        </div>
    </div>
</div>
