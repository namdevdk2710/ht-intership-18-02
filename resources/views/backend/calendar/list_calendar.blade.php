@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table">
    <div>
        <h2 class="text-center">Danh sách lịch hiến máu</h2>
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
                <td>{{ $calendar->address }} - {{ $calendar->commune->name }}
                </td>
                <td>{{ $calendar->user->username }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal"
                        data-target="#showDetailCalendar">Chi tiết</a>
                    <a class="btn btn-sm btn-warning" href="#">Sửa</a>
                    <a class="btn btn-sm btn-danger" href="#">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $calendars->links() }}
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="showDetailCalendar" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Thông tin chi tiết</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>



@endsection
