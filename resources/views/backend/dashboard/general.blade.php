<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-calendar dashboard-icon-custom"> </i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Lịch sắp tới</h4>
                <h3>
                    {{ $calendars->count() }}
                </h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Users</h4>
                <h3>
                {{ $users->count() }}
                </h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-wpforms dashboard-icon-custom"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Yêu cầu(30d)</h4>
                <h3>
                    {{ $requestBloods->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->count() }}
                </h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Lượng máu</h4>
                <h3>{{ $bloodBags->sum('unit') }}</h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
