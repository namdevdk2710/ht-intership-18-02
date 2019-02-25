@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table" style="margin:0px 10px; padding:5px 15px; background: #fff">
    <div>
        <h2 class="text-center">Danh sách lịch hiến máu nhận máu</h2>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Người tạo</th>
                <th scope="col">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calendars as $key => $calendar)
            <tr>
                <th scope="row">{{ $key }}</th>
                <td>{{ $calendar->time }}</td>
                <td>{{ $calendar->address }} - {{ $calendar->commune->name }}</td>
                <td>{{ $calendar->user->username }}</td>
                <td>
                    <a class="btn btn-primary" href="#">Chi tiết</a>
                    <a class="btn btn-warning" href="#">Sửa</a>
                    <a class="btn btn-danger" href="#">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
    {{ $calendars->links() }}
    </div>
</div>
@endsection
