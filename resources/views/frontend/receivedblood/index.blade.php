@extends('frontend.layouts.app')
@section('content')

<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a href="{{route('requestBlood.getRegisterReceived')}}"
            class="breadcrumb-item active" aria-current="page">
                Đăng ký nhận máu
            </a>
        </ol>
    </div>
</div>
@if (session('message'))
<script>
alert('{{ session('message') }}');
</script>
@endif
<div class="container">
    <div class="card w-75 my-5 mx-auto">
        <div class="card-header text-uppercase text-center">
            Đăng ký nhận máu
        </div>
        <div class="card-body">

            {!! Form::open
            ([
                'route'=>'requestBlood.postRegisterReceived',
                'id' => 'js-register-donated'
            ])
            !!}

            @if(isset($user))

            {!! Form::label('Nhóm máu cần nhận', null , ['class' => 'text-dark text-left mb-2']) !!}
            {!! Form::select
            (
                'bloodgroup',
                $bloodGrooups->pluck('name', 'id')->toArray(),
                null,
                ['class'=>'form-control mb-3 w-100']
            )
            !!}
            @else
            <div class="form-group row  mb-0">
                <div class="col-md-6 pb-2">
                {!! Form::label('E-Mail', null , ['class' => 'text-dark text-left']) !!}
                {!! Form::text
                (
                    'email',
                    null,
                    ['class' => 'form-control', 'placeholder' => 'Email']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                {!! Form::label('Họ Tên', null , ['class' => 'text-dark text-left']) !!}
                {!! Form::text
                (
                    'name',
                    null,
                    ['class'=>'form-control', 'placeholder' => 'Họ và tên']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                {!! Form::label('Ngày sinh', null, ['class' => 'text-dark text-left']) !!}
                {!! Form::date
                (
                    'dob',
                    (isset($user->information->dob)) ? $user->information->dob : null,
                    ['class'=>'form-control']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                {!! Form::label('Cmnd', null , ['class' => 'text-dark text-left']) !!}
                {!! Form::text
                (
                    'cmnd',
                    (isset($user->information->cmnd)) ? $user->information->cmnd : null,
                    ['class'=>'form-control', 'placeholder' => 'Chứng minh nhân dân']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                {!! Form::label('Điện thoại', null , ['class' => 'text-dark text-left']) !!}
                {!! Form::text
                (
                    'phone',
                    (isset($user->information->phone)) ? $user->information->phone : null,
                    ['class'=>'form-control', 'placeholder' => 'Số điện thoại']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                {!! Form::label('Nhóm máu cần nhận', null , ['class' => 'text-dark text-left']) !!}
                {!! Form::select
                (
                    'bloodgroup',
                    $bloodGrooups->pluck('name', 'id')->toArray(),
                    null,
                    ['class'=>'form-control w-100']
                )
                !!}
                </div>
                <div class="col-md-6 pb-2">
                    {!! Form::label('Thành phố', null , ['class' =>'text-dark text-left']) !!}
                    {!! Form::select
                    (
                        'cities',
                        [''=>'--- Chọn Thành phố---']+$cities,
                        null,
                        ['class'=>'form-control']
                    )
                    !!}
                </div>
                <div class="col-md-6 pb-2">
                    {!! Form::label('Quận/huyện', null , ['class' => 'text-dark text-left']) !!}
                    {!! Form::select
                    (
                        'districts',
                        [''=>'--- Chọn Quận/Huyện---'],
                        null,
                        ['class'=>'form-control']
                    )
                    !!}
                </div>
                <div class="col-md-6 pb-2">
                    {!! Form::label('Xã/phường', null , ['class' => 'text-dark text-left']) !!}
                    {!! Form::select
                    (
                        'communes',
                        [''=>'--- Chọn Xã/Phường---'],
                        null,
                        ['class'=>'form-control']
                    )
                    !!}
                </div>
                <div class="col-md-6 pb-2">
                    {!! Form::label('Địa chỉ', null , ['class' => 'text-dark text-left']) !!}
                    {!! Form::text
                    (
                        'address',
                        null,
                        ['class'=>'form-control', 'placeholder' => 'Địa chỉ nhà']
                    )
                    !!}
                </div>
            </div>
            <div class="text-center">
                <label class="text-dark text-left py-2">
                    <span>
                        Giới tính
                    </span>
                    <div class="form-check form-check-inline mx-3">
                        {!! Form::radio
                        (
                            'gender',
                            1,
                            (isset($user->information->gender) && $user->information->gender == 1) ? true : null,
                            ['class' => 'form-check-input']
                        )
                        !!}
                        {!! Form::label('Nam', null,['class' => 'form-check-label text-dark'])
                        !!}
                    </div>
                    <div class="form-check form-check-inline">
                        {!! Form::radio
                        (
                            'gender',
                            0,
                            (isset($user->information->gender) && $user->information->gender == 0) ? true : null,
                            ['class' => 'form-check-input'])
                        !!}
                        {!! Form::label('Nữ', null, ['class' => 'form-check-label text-dark'])
                        !!}
                    </div>
                </label>
            </div>
            @endif
            <div class="form-group mb-0">
                {!! Form::button
                (
                    'Đăng ký',
                    [
                        'class' => 'btn-sm btn-info float-right received-submit',
                        'type'=>'submit',
                    ]
                )
                !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('asset/fe/js/jquery-2.2.3.min.js')}}"></script>
<script>
    $('.received-submit').click(function() {
        return confirm('Xác nhận đăng ký');
    });
</script>
@endsection
