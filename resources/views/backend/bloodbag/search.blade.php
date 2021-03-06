@extends('backend.layouts.app')
@section('content')
<div class="table-responsive blood-bag">
    <div class='calendar-table-header'>
        <span
            class="calendar-table-header-title text-center text-uppercase col-12">Tra
            cứu túi máu</span>
    </div>
    <div class="row">
        @if ($errors->any())
        <div
            class="alert alert-danger col-sm-offset-4 col-sm-4 col-sm-offset-4">
            <ul class=''>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="import-title">
        <span>
            Thông tin người hiến máu
        </span>
    </div>
    @include('backend.bloodbag.search_user_info')
    <div class="import-title">
        <span>
            Kết quả
        </span>
    </div>
    @include('backend.bloodbag.search_result')
</div>
@endsection
