@extends('frontend.layouts.app')
@section('content')
@if (session('message'))
<script>
    alert('{{ session('message') }}');
</script>
@endif
<div class="container">
    <div class="card w-50 my-5 mx-auto">
        <div class="card-header">
            Đăng ký nhận máu
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class=''>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(['route'=>'requestBlood.postRegisterReceived',
            'id' => 'js-register-received-form'])
            !!}
            <div class="form-group mb-0">
                {!! Form::label('E-Mail', null , ['class' =>
                'text-dark text-left']) !!}
                @if (Auth::check())
                {!! Form::text('email',
                Auth::user()->email,['class'=>'form-control', 'readonly' =>
                true])
                !!}
                @else
                {!! Form::text('email',null,['class'=>'form-control'])
                !!}
                @endif
                {!! Form::label('Họ Tên', null , ['class' =>
                'text-dark text-left']) !!}
                {!! Form::text('name',(isset($user->information->name)) ?
                $user->information->name : null,['class'=>'form-control'])
                !!}
                {!! Form::label('Ngày sinh', null , ['class' =>
                'text-dark text-left']) !!}
                {!! Form::date('dob', (isset($user->information->dob)) ?
                $user->information->dob : now(),['class'=>'form-control'])
                !!}
                {!! Form::label('Cmnd', null , ['class' =>
                'text-dark text-left']) !!}
                {!! Form::text('cmnd', (isset($user->information->cmnd)) ?
                $user->information->cmnd : null ,['class'=>'form-control'])
                !!}
                {!! Form::label('Điện thoại', null , ['class' =>
                'text-dark text-left']) !!}
                {!! Form::text('phone',(isset($user->information->phone)) ?
                $user->information->phone : null,['class'=>'form-control'])
                !!}
                {!! Form::label('Nhóm máu', null , ['class' =>
                'text-dark text-left']) !!}
                {!! Form::select('bloodgroup',$bloodGrooups->pluck('name',
                'id')->toArray(), null,['class'=>'form-control w-100'])
                !!}
            </div>
            <label class="text-dark text-left py-2">
                <span>
                    Giới tính
                </span>
                <div class="form-check form-check-inline mx-3">
                    {!! Form::radio('gender', 1,
                    (isset($user->information->gender) &&
                    $user->information->gender == 1) ? true : null,['class' =>
                    'form-check-input'])
                    !!}
                    {!! Form::label('Nam', null,['class' =>
                    'form-check-label
                    text-dark'])
                    !!}
                </div>
                <div class="form-check form-check-inline">
                    {!! Form::radio('gender', 0,
                    (isset($user->information->gender) &&
                    $user->information->gender == 0) ? true : null, ['class' =>
                    'form-check-input'])
                    !!}
                    {!! Form::label('Nữ', null, ['class' => 'form-check-label
                    text-dark'])
                    !!}
                </div>
            </label>
            <div class="form-group mb-0">
                {!! Form::button('Đăng ký', ['class' => 'btn-sm btn-info
                float-right received-submit',
                'type'=>'submit', 'id'=>'js-add-calendar-form-submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/asset/fe/js/jquery-2.2.3.min.js')}}"></script>
<script>
$('.received-submit').click(function() {
    return confirm('Xác nhận đăng ký');
});
</script>
@endsection
