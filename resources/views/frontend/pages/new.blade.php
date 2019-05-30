<div class="tags mt-4 p-4 border">
    <h3 class="blog-title text-dark">Tin tức mới nhất</h3>
    <div class="posts-grids">
        @foreach($posts as $post)
        <div class="row posts-grid mt-4">
            <a href="{{route('getDetailNews', $post->id)}}">
                <div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
                    <img src="{{ asset($post->image_url) }}" width="95px" height="130px" />
                </div>
                <div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-4">
                    <h4>
                        <a href="{{route('getDetailNews', $post->id)}}">{{$post->title}}</a>
                    </h4>
                    <ul class="wthree_blog_events_list mt-2">
                        <p class="p-new"></p>
                        <li class="mr-2 text-dark">
                            <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                            {{substr($post->created_at, 0, 10)}}
                        </li>
                        <li>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            {{$post->user->information->name}}
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
