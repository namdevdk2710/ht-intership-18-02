<div class="posts p-4 border">
    <h3 class="blog-title text-dark">Lịch hiến sắp tới</h3>
    @foreach($calendars as $calendar)
    <div class="posts-grids">
        <div class="row posts-grid mt-4">
            <div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
                <a href="{{route('requestBlood.getRegisterDonated')}}">
                    <img src="{{asset('uploads/images/default.png')}}" alt=" " class="img-fluid" />
                </a>
            </div>
            <div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-4">
                <h4>
                    <a href="{{route('requestBlood.getRegisterDonated')}}" class="text-dark">
                        Hiến máu tại {{$calendar->address}}
                    </a>
                </h4>
                <ul class="wthree_blog_events_list mt-2">
                    <li class="mr-2 text-dark">
                        <i class="fa fa-calendar mr-2" aria-hidden="true"></i>{{substr($calendar->time, 6)}}
                    </li>
                    <li class="mr-2 text-dark">
                        <i class="fa fa-clock mr-2" aria-hidden="true"></i>
                        {{substr($calendar->time, 0, 5)}}
                    </li>
                    <li>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        {{$calendar->user->information->name}}
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
