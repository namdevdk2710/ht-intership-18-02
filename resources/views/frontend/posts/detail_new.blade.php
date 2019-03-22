<!-- left side -->
<div class="comments my-5">
    <div class="comments-grids mt-4">
        <div class="row comments-grid">
            <div class="comments-grid-left text-center">
                <h4 class="text-danger">{{ $post->title}}</h4><br>
                <img src="{{asset('uploads/images/'.$post->image_url)}}" width="50%" height="auto" />

                <div class="comments-grid-right mt-3">

                    <ul class="my-2 text-center">
                        <li class="font-weight-bold">{{substr($post->created_at, 0, 10)}}
                            <i>| Ngày đăng</i>
                        </li>
                    </ul>
                    @php
                        echo $post->content
                    @endphp
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="{{route('getNews')}}">
            Quay lại trang tin tức
        </a>
    </div>
</div>
