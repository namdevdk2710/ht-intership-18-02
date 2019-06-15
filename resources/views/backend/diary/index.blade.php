@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table">
    <div class='calendar-table-header'>
        {!! Form::open(['route' => 'diary.search', 'class' => 'form-inline'])
        !!}
        {!! Form::select
            (
                'code',
                ['request_id'=>'Mã yêu cầu', 'cmnd' => 'CMND']
                ,null ,
                ['class'=>'form-control']
            )
        !!}
        {!! Form::text('search', null, ['class' => 'form-control']) !!}
        {!! Form::button
            (
                '<i class="fa fa-search"></i> Tìm kiếm',
                ['class' => 'btn btn-default', 'type' => 'submit']
            )
        !!}
        {!! Form::close() !!}
        <span class="calendar-table-header-title text-center text-uppercase">Tra
            cứu nhật ký</span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Mã yêu cầu</th>
                <th scope="col" class="text-center">Người yêu cầu</th>
                <th scope="col" class="text-center">Loại</th>
                <th scope="col" class="text-center">E-mail</th>
                <th scope="col" class="text-center">Số điện thoại</th>
                <th scope="col" class="text-center">Chứng minh nhân dân</th>
            </tr>
        </thead>
        <tbody id="body-calendar">
            @foreach($diaries as $diary)
            <tr>
                <td class="text-center">
                    {{ $diary->request_blood_id }}
                </td>
                <td class="text-center">
                    {{ $diary->requestBlood->user->information->name }}
                </td>
                <td class="text-center">
                    {{ ($diary->requestBlood->type === 'cho') ? 'hiến máu' : 'nhận máu' }}
                </td>
                <td class="text-center">
                    {{ $diary->requestBlood->user->email }}
                </td>
                <td class="text-center">
                    {{ $diary->requestBlood->user->information->phone }}
                </td>
                <td class="text-center">
                    {{ $diary->requestBlood->user->information->cmnd }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $diaries->links() }}
    </div>
</div>
@endsection
