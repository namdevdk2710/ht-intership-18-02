<!-- right side -->
<div class="col-lg-4 event-right mt-lg-0 mt-sm-5 mt-4">
    <div class="event-right1">
        <div class="categories my-4 p-4 border">
            <h3 class="blog-title text-dark">Danh mục</h3>
            <ul>
                <li class="mt-3">
                    <i class="fas fa-check mr-2"></i>
                    <a href="">Tin tức</a>
                </li>
                <li class="mt-3">
                    <i class="fas fa-check mr-2"></i>
                    <a href="{{route('requestBlood.getRegisterDonated')}}">Đăng ký hiến máu</a>
                </li>
                <li class="mt-3">
                    <i class="fas fa-check mr-2"></i>
                    <a href="{{route('requestBlood.getRegisterReceived')}}">Đăng ký nhận máu</a>
                </li>
                <li class="mt-3">
                    <i class="fas fa-check mr-2"></i>
                    <a href="{{route('getDiary')}}">Tra cứu nhật ký</a>
                </li>
                <li class="mt-3">
                    <i class="fas fa-check mr-2"></i>
                    <a href="{{route('getSearch')}}">Tra cứu kết quả xét nghiệm</a>
                </li>
            </ul>
        </div>
        @include('frontend.pages.calendar')
        @include('frontend.pages.new')
    </div>
</div>
<!-- //right side -->
