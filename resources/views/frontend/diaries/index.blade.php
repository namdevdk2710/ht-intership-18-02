@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a href="{{route('getDiary')}}"
             class="breadcrumb-item active" aria-current="page">
                Tra cứu nhật ký
            </a>
        </ol>
    </div>
</div>
<div class="container">
    <table class="table table-bordered my-5">

    </table>
    <div class="d-flex justify-content-center">
        <div class='calendar-table-header'>
            {!! Form::open(['route' => 'postDiary', 'class' => 'form-inline'])
            !!}
            {!! Form::select('code',['id'=>'Mã người dùng', 'cmnd' => 'CMND']
            ,null ,['class'=>'form-control']) !!}
            {!! Form::text('search', null, ['class' => 'form-control', 'required']) !!}
            {!! Form::button('<i class="fa fa-search"></i> Search', ['class' => 'btn
            btn-default', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="mb-5 text-center span-color">
        <span>(* Nhập mã người dùng hoặc CMND để tra cứu)</span>
    </div>
</div>
@endsection
