<div class="col-md-6 w3agile-notifications">
    <div class="notifications">
        <header class="dashboard-notification-heading">
            Yêu cầu hiến / nhận máu
        </header>
        <div class="notify-w3ls">
            @foreach($requestBloods as $key => $requestBlood)
            @if ($key >= 5)
            @break
            @endif
            <div class="alert alert-success ">
                <span class="alert-icon"><i class="fa fa-wpforms"></i></span>
                <div class="notification-info">
                    <ul class="clearfix notification-meta">
                        <li class="pull-left notification-sender">
                            <span class='text-info'>{{ $requestBlood->user->information->name }}</span>
                            <span> yêu cầu </span>
                            @if ($requestBlood->type == 'cho')
                            <span class='text-danger'>Hiến máu</span>
                            @else
                            <span class='text-primary'>Nhận máu</span>
                            @endif
                        </li>
                        <li class="pull-right notification-time">
                            {{\Carbon\Carbon::parse($requestBlood->created_at)->diffForHumans(\Carbon\Carbon::now())}}
                        </li>
                    </ul>
                    <p class="text-muted">
                    @if(isset($requestBlood->calendar->time))
                        Lịch thực hiện
                        <span class="text-primary">
                            {{ $requestBlood->calendar->time }}
                        </span>
                    @else
                        Yêu cầu lúc
                        <span class="text-primary">
                            {{ $requestBlood->created_at }}
                        </span>
                    @endif
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
