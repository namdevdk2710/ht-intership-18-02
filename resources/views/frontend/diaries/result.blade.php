@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a href="{{route('getDiary')}}" class="breadcrumb-item active" aria-current="page">
                Tra cứu nhật ký
            </a>
        </ol>
    </div>
</div>
<div class="container search-container">
    <table class="table table-bordered my-3">

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
    <div class="table-responsive">
        <table class="table table-bordered table-search">
            <thead>
                <tr>
                    <th class="text-center">Mã người dùng</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">CMND</th>
                    <th class="text-center">Thời gian</th>
                    <th class="text-center">Loại</th>
                    <th class="text-center">Thể tích</th>
                    <th class="text-center">Kết quả</th>
                </tr>
            </thead>
            <tbody id="body-calendar">
                @if($results->count() > 0)
                @foreach($results as $result)
                <tr>
                    <td class="text-center">
                        {{ $result->user_id }}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->user->information->name }}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->user->information->cmnd }}
                    </td>
                    @if($result->requestBlood->type == 'cho')
                    <td class="text-center">
                        {{ $result->requestBlood->calendar->time }}
                    </td>
                    @else
                    <td class="text-center">
                        {{ $result->bloodBag->updated_at}}
                    </td>
                    @endif
                    @if($result->requestBlood->type == 'cho')
                    <td class="text-center">
                        {{ ' Hiến máu '}}
                    </td>
                    @else
                    <td class="text-center">
                        {{ ' Nhận máu '}}
                    </td>
                    @endif
                    <td class="text-center">
                        {{ $result->bloodBag->unit }}
                    </td>
                    @if($result->requestBlood->type == 'cho')
                    <td>
                        {{$result->requestBlood->bloodBag[0]->status ?'Đạt' : 'Không Đạt'}}
                    </td>
                    @else
                    <td>
                        {{ $result->requestBlood->status ? 'Đã nhận' : 'Chưa nhận' }}
                    </td>
                    @endif
                </tr>
                @endforeach
                <tr>
                    <td colspan="7" class="text-center">
                        Số lần đã hiến:
                        <span class="text-danger mr-4">
                            {{ $result->user->requestBlood->bloodBag->count() }}
                        </span>
                        Số lần đã nhận:
                        <span class="text-danger">
                            {{ $result->bloodBag->count() }}
                        </span>
                    </td>
                </tr>
                @else
                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Không tìm thấy dữ liệu với mã này
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="pagination-wrapper text-center">
        {{$results->links()}}
    </div>
</div>
@endsection
