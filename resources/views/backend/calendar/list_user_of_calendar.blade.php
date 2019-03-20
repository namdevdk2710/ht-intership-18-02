@extends('backend.layouts.app')
@section('content')
<div class="table-responsive">
    <a class="btn btn-link" href="{{ route('calendar.index') }}">Quay lại</a>
    <div class="panel-group calendar-show" id="accordion" role="tablist"
        aria-multiselectable="true">
        <div class="panel panel-primary">
            <div class="panel-heading calendar-show-heading" role="tab"
                id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Thông tin chi tiết
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in"
                role="tabpanel" aria-labelledby="headingOne">
                <table class="table panel-body">
                    <tbody>
                        <tr>
                            <td class="col-sm-6">
                                <span class="col-sm-6">Người tạo</span>
                                <h5 class="col-sm-6">
                                    {{ $calendar->user->information->name }}
                                </h5>
                            </td>
                            <td class="col-sm-6">
                                <span class="col-sm-6">Chức vụ</span>
                                <h5 class="col-sm-6">
                                    {{ ($calendar->user->role == 1) ? 'Administrator' : (($calendar->user->role == 2) ? 'Staff' : '') }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-6">
                                <span class="col-sm-6">Thời gian</span>
                                <h5 class="col-sm-6">
                                    {{ $calendar->time }}
                                </h5>
                            </td>
                            <td class="col-sm-6">
                                <span class="col-sm-6">Số người đăng kí</span>
                                <h5 class="col-sm-6">
                                    {{ $calendar->requestBloods->count() }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="" colspan="2">
                                <span class="col-sm-3">Địa điểm</span>
                                <h5 class="col-sm-9">
                                    {{ $calendar->address . ' - ' . $calendar->commune->name . ' - ' . $calendar->commune->district->name . ' - ' .$calendar->commune->district->city->name }}
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading calendar-show-heading" role="tab"
                id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Danh sách người đăng kí
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse"
                role="tabpanel" aria-labelledby="headingTwo">
                <table class="table table-hover panel-body">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Stt</th>
                            <th scope="col" class="text-center">Tên</th>
                            <th scope="col" class="text-center">Giới tính</th>
                            <th scope="col" class="text-center">E-Mail</th>
                            <th scope="col" class="text-center">Điện thoại</th>
                        </tr>
                    </thead>
                    <tbody id="body-calendar">
                        @foreach($calendar->requestBloods as $key => $request)
                        <tr>
                            <th scope="row" class="text-center">{{ $key +1 }}
                            </th>
                            <td class="text-center">
                                {{ $request->user->information->name }}
                            </td>
                            <td class="text-center">
                                {{ ($request->user->information->gender == 1) ? 'Nam' : 'Nữ'}}
                            </td>
                            <td class="text-center">{{ $request->user->email }}
                            </td>
                            <td class="text-center">
                                {{ $request->user->information->phone }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
