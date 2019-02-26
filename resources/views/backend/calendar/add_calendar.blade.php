@extends('backend.layouts.app')
@section('content')
<div class="table-responsive page-content-wrapper">
    <div>
        <h2 class="text-center">Thêm mới lịch</h2>
    </div>
    {!! Form::open(['route' => 'calendar.postAddCalendar']) !!}

    {!! Form::close() !!}
</div>
@endsection
