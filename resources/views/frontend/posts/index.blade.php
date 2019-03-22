@extends('frontend.layouts.app')
@section('content')
@include('frontend.posts.header')
<div class="single-w3l pb-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabmenu1" role="tabpanel">
                <div class="row inner_sec_info">
                    <!-- left side -->
                    <div class="col-lg-8">
                        @include('frontend.posts.new')
                    </div>
                    <!-- //left side -->
                    <div class="col-lg-4">
                        @include('frontend.pages.title')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
