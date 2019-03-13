@extends('backend.layouts.app')
@section('content')
<div class="table-responsive blood-bag">
    <div class='calendar-table-header'>
        <span
            class="calendar-table-header-title text-center text-uppercase col-12">Danh
            sách lịch hiến máu</span>
    </div>
    {!! Form::open(['method' => 'POST', 'route' => 'blood-bags.store',
    'class' => '']) !!}
    <div class="import-title">
        <span>
            Thông tin người hiến máu
        </span>
    </div>
    @include('backend.bloodbag.user_info')
    <div class="import-title">
        <span>
            Nhập Kết quả
        </span>
    </div>
    @include('backend.bloodbag.result')
    <div>
        {!! Form::submit('Lưu lại', ['class' => 'btn-sm btn-primary
        import-submit']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
