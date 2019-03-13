@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">Danh sách lịch
            hiến máu</span>
        <div class="col-md-2 col-sm-4 col-6 text-center">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add-new-calendar">
                Thêm Lịch
            </a>
            @include('backend.calendar.add_calendar')
        </div>
    </div>
    <table class="table table-hover">
        <div class="form-group col-md-4 inputSearch">
            <label class="col-md-2 lable-search">Search:</label>
            <div class="col-sm-8">
                <input class="form-control myInput" type="text" placeholder="Search..">
            </div>
        </div>
        <thead>
            <tr>
                <th scope="col" class="text-center">Stt</th>
                <th scope="col" class="text-center">Thời gian</th>
                <th scope="col" class="text-center">Địa điểm</th>
                <th scope="col" class="text-center">Người tạo</th>
                <th scope="col" class="text-center">Hoạt động</th>
            </tr>
        </thead>
        <tbody id="body-calendar">
            @foreach($calendars as $key => $calendar)
            <tr>
                <th scope="row" class="text-center">{{ $key +1 }}</th>
                <td class="text-center">{{ $calendar->time }}</td>
                @php
                $add = $calendar->address . ' - ' . $calendar->commune->name .
                ' - ' . $calendar->commune->district->name . ' - ' .
                $calendar->commune->district->city->name
                @endphp
                <td class="text-center">{{ $add }}</td>
                <td class="text-center">{{ $calendar->user->username }}</td>
                <td class="text-center text-nowrap">
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal"
                        data-target="#showDetailCalendar{{$calendar->id}}">
                        Chi tiết
                    </a>
                    @include('backend.calendar.detail_calendar')
                    <a class="btn btn-sm btn-warning" id="calendar-edit" href="#" data-toggle="modal"
                        data-target="#edit-calendar-{{$calendar->id}}">
                        Sửa
                    </a>
                    @include('backend.calendar.edit_calendar')
                    <a type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#del-calendar-{{$calendar->id}}" href="#">
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
