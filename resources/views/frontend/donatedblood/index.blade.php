@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a href="{{route('requestBlood.getRegisterDonated')}}"
             class="breadcrumb-item active" aria-current="page">
                Đăng ký hiếm máu
            </a>
        </ol>
    </div>
</div>
<div class="container">
    <table class="table table-bordered my-5">
        <thead>
            <tr class="text-center">
                <th class="text-nowrap" scope="col">Thời gian</th>
                <th class="text-nowrap" scope="col">Ngày</th>
                <th class="text-nowrap" scope="col">Địa điểm</th>
                <th class="text-nowrap" scope="col">Số người đk</th>
                <th class="text-nowrap" scope="col">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calendars as $key => $calendar)
            <tr class="text-center">
                <td class="text-nowrap">
                    {{(new DateTime($calendar->time))->format('H:m')}}</td>
                <td class="text-nowrap">
                    {{(new DateTime($calendar->time))->format('d/m/Y')}}</td>
                @php
                $add = $calendar->address . ' - ' . $calendar->commune->name .
                ' - ' . $calendar->commune->district->name . ' - ' .
                $calendar->commune->district->city->name
                @endphp
                <td>{{ $add }}</td>
                <td class="text-nowrap">{{ $calendar->requestBloods->count() }}
                </td>
                <td class="text-nowrap">
                    @if (Auth::check())
                    <a type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#register-calendar{{$calendar->id}}" href="#">
                        Đăng ký
                    </a>
                    @include('frontend.donatedblood.confirm')
                    @else
                    <a type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#register-user-and-calendar{{$calendar->id}}" href="#">
                        Đăng ký
                    </a>
                    @include('frontend.donatedblood.register')
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-5 d-flex justify-content-center">
        {{ $calendars->links() }}
    </div>
</div>
@if (session('message'))
    <script>
        alert("{{ session('message') }}");
    </script>
@endif
@endsection
