@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a  href="{{route('getNews')}}" class="breadcrumb-item" aria-current="page">Tin tức</a>
            <li  href=""class="breadcrumb-item active" aria-current="page">Tin tức chi tiết</li>
        </ol>
    </div>
</div>
<div class="single-w3l pb-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabmenu1" role="tabpanel">
                <div class="row inner_sec_info">
                    <!-- left side -->
                    <div class="col-lg-8">
                        @include('frontend.posts.detail_new')
                    </div>
                    <!-- //left side -->
                    <div class="col-lg-4">
                        @include('frontend.pages.title')
                        @include('frontend.pages.new')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
