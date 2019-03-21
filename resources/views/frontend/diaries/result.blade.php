@extends('frontend.layouts.app')
@section('content')
<div class="container search-container">
    <table class="table table-bordered my-3">

    </table>
    <div class="d-flex justify-content-center">
        <div class='calendar-table-header'>
            {!! Form::open(['route' => 'postDiary', 'class' => 'form-inline'])
            !!}
            {!! Form::select('code',['id'=>'Mã người dùng', 'cmnd' => 'CMND']
            ,null ,['class'=>'form-control']) !!}
            {!! Form::text('search', null, ['class' => 'form-control']) !!}
            {!! Form::button('<i class="fa fa-search"></i> Search', ['class' => 'btn
            btn-default', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="mb-5 text-center span-color">
        <span>(* Nhập mã hiến máu hoặc CMND để tra cứu)</span>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-search">
            <thead>
                <tr>
                    <th class="text-center">Mã hến máu</th>
                    <th class="text-center">Tên người hiến</th>
                    <th class="text-center">CMND</th>
                    <th class="text-center">Thời gian hiến</th>
                    <th class="text-center">Nhóm máu</th>
                    <th class="text-center">Thể tích</th>
                    <th class="text-center">Kết quả</th>
                    <th class="text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody id="body-calendar">
                @if($results->count() > 0)
                @foreach($results as $result)

                <tr>
                    <td class="text-center">
                        {{ $result->requestBlood->id }}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->user->information->name }}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->user->information->cmnd }}
                    </td>
                    <td class="text-center">
                    {{ $result->requestBlood->created_at }}
                    </td>
                    <td class="text-center">
                        {{ $result->user->information->bloodGroup->name}}
                    </td>

                    <td class="text-center">
                        {{ $result->created_at }}
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Không tìm thấy dữ liệu với mã này
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="pagination-wrapper">

    </div>
</div>
@endsection
