<div class="col-md-6 w3agile-notifications">
    <div class="notifications">
        <header class="dashboard-notification-heading">
            Nhật ký
        </header>
        <div class="notify-w3ls">
            @foreach($diaries as $key => $diary)
            <div class="alert alert-info clearfix">
                <span class="alert-icon"><i class="fa fa-clipboard"></i></span>
                <div class="notification-info">
                    <ul class="clearfix notification-meta">
                        <li class="pull-left notification-sender">
                            <span>
                                <a href="#">
                                    Admin
                                </a>
                                thực hiện
                            </span>
                            <span class="text-success">
                                {{$diary->note}}
                            </span>
                        </li>
                        <li class="pull-right notification-time">
                            {{\Carbon\Carbon::parse($diary->created_at)->diffForHumans(\Carbon\Carbon::now())}}
                        </li>
                    </ul>
                    <p class="text-muted">
                        Với đối tượng
                        <span class="text-primary">
                            {{ $diary->requestBlood->user->information->name }}
                        </span>
                    </p>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                {{ $diaries->links() }}
            </div>
        </div>
    </div>
</div>
