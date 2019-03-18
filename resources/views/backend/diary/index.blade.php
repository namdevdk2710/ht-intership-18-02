@extends('backend.layouts.app')
@section('content')
<div class="table-responsive calendar-table">
    <div class='calendar-table-header'>
        {!! Form::open(['route' => 'diary.search', 'class' => 'form-inline'])
        !!}
        {!! Form::select('code',['request_id'=>'Mã hiến máu', 'cmnd' => 'CMND']
        ,null ,['class'=>'form-control']) !!}
        {!! Form::text('search', null, ['class' => 'form-control']) !!}
        {!! Form::button('<i class="fa fa-search"></i> Search', ['class' => 'btn
        btn-default', 'type' => 'submit']) !!}
        {!! Form::close() !!}
        <span class="calendar-table-header-title text-center text-uppercase">Tra
            cứu nhật ký</span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Người yêu cầu</th>
                <th scope="col" class="text-center">Người nhập thông tin</th>
                <th scope="col" class="text-center">Nội dung</th>
                <th scope="col" class="text-center">Thời gian</th>
            </tr>
        </thead>
        <tbody id="body-calendar">
            @foreach($diaries as $diary)
            <tr>
                <td class="text-center">
                    {{ $diary->requestBlood->user->information->name }}
                </td>
                <td class="text-center">
                    {{ $diary->user->information->name }}
                </td>
                <td class="text-center">
                    {{ $diary->note }}
                </td>
                <td class="text-center">
                    {{ $diary->created_at }}
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
