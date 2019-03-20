@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <table class="table table-bordered my-5">

    </table>
    <div class="d-flex justify-content-center">
        <div class='calendar-table-header'>
            {!! Form::open(['route' => 'search', 'class' => 'form-inline'])
            !!}
            {!! Form::select('code',['request_id'=>'Mã hiến máu', 'cmnd' => 'CMND']
            ,null ,['class'=>'form-control']) !!}
            {!! Form::text('search', null, ['class' => 'form-control']) !!}
            {!! Form::button('<i class="fa fa-search"></i> Search', ['class' => 'btn
            btn-default', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="mb-2 text-center span-color">
        <span>(* Nhập mã hiến máu hoặc CMND để tra cứu)</span>
    </div>
</div>
@endsection