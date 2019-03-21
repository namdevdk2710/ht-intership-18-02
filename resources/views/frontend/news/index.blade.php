@foreach($posts as $post)
@if($post->id % 2 != 0)
<div class="w3ls-welcome pt-5">
    <div class="container col-lg-8  pt-xl-5 post-layout">
        <div class="row col-lg-9">
            <div class="col-lg-3 welcome-right">
                <img src="{{asset('uploads/images/'.$post->image_url)}}" alt=" " class="img-fluid">
            </div>
            <div class="col-lg-9 welcome-left mt-4">
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                <div class="readmore-w3-agileits mt-md-5 mt-4">
                    <a href="" class="w3ls-button-agile text-dark">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="w3ls-welcome pb-5">
        <div class="container col-lg-8  pt-xl-5 post-layout">
            <div class="row col-lg-9">
                <div class="col-lg-3 welcome-right">
                    <img src="{{asset('uploads/images/'.$post->image_url)}}" alt=" " class="img-fluid">
                </div>
                <div class="col-lg-9 welcome-left mt-4">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->content}}</p>
                    <div class="readmore-w3-agileits mt-md-5 mt-4">
                        <a href="" class="w3ls-button-agile text-dark">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @endif
            @endforeach
            <!-- //middle section -->
