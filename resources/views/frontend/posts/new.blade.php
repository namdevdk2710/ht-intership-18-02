<!-- left side -->
<div class="comments my-5">
    <h3 class="blog-title text-dark">Tin tức mới nhất</h3>
    @foreach($posts as $post)
    @if($post->id % 2 == 0)
    <div class="comments-grids mt-4">
        <div class="row comments-grid">
            <div class="col-3 comments-grid-left">
                <img src="{{asset('uploads/images/'.$post->image_url)}}" width="95px" height="130px" />
            </div>
            <div class="col-8 comments-grid-right mt-3">
                <h4>{{ $post->title}}</h4>
                <ul class="my-2">
                    <li class="font-weight-bold">{{substr($post->created_at, 0, 10)}}
                        <i>|</i>
                    </li>
                    <li>
                        <a href="{{route('getDetailNews', $post->id)}}" class="font-weight-bold">
                            Xem chi tiết
                        </a>
                    </li>
                </ul>
                <p> {{ substr($post->content, 3, 100) }}... </p>
            </div>
        </div>
    </div>
    <hr>
    @else
    <div class="comments-grids mt-4">
        <div class="row comments-grid">
            <div class="col-8 comments-grid-right mt-3 text-right">
                <h4>{{ $post->title}}</h4>
                <ul class="my-2">
                    <li class="font-weight-bold">{{substr($post->created_at, 0, 10)}}
                        <i>|</i>
                    </li>
                    <li>
                        <a href="{{route('getDetailNews', $post->id)}}" class="font-weight-bold">
                            Xem chi tiết
                        </a>
                    </li>
                </ul>
                <p> {{ substr($post->content, 3, 100) }}... </p>
            </div>
            <div class="col-3 comments-grid-left">
                <img src="{{asset('uploads/images/'.$post->image_url)}}" width="95px" height="130px" />
            </div>
        </div>
    </div>
    <hr>
    @endif
    @endforeach
</div>
