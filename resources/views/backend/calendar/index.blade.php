@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table">
    <div class='row'>
        <h2 class="text-center col-sm-10">Danh sách lịch hiến máu</h2>
        <a class="btn btn-sm btn-primary col-sm-1" href="#" data-toggle="modal"
            data-target="#add-new-calendar">Thêm Lịch</a>
        @include('backend.calendar.add_calendar')
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
                <th scope="row">{{ $key +1 }}</th>
                <td>{{ $calendar->time }}</td>
                @php
                $add = $calendar->address . ' - ' . $calendar->commune->name .
                ' - ' . $calendar->commune->district->name . ' - ' .
                $calendar->commune->district->city->name
                @endphp
                <td>{{ $add }}</td>
                <td>{{ $calendar->user->username }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="#"
                        data-toggle="modal"
                        data-target="#showDetailCalendar{{$calendar->id}}">
                        Chi tiết
                    </a>
                    @include('backend.calendar.detail_calendar')
                    <a class="btn btn-sm btn-warning" id="calendar-edit" href="#" data-toggle="modal"
                        data-target="#edit-calendar-{{$calendar->id}}">
                        Sửa
                    </a>
                    @include('backend.calendar.edit_calendar')
                    <a type="button" class="btn btn-danger btn-sm"
                        data-toggle="modal" data-target="#del-calendar-{{$calendar->id}}" href="#">
                        Xóa
                    </a>
                    @include('backend.calendar.delete_confirm_dialog')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $calendars->links() }}
    </div>
</div>
@endsection
