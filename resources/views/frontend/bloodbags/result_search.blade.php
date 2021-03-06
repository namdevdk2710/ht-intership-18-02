@extends('frontend.layouts.app')
@section('content')
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <a href="{{route('getSearch')}}" class="breadcrumb-item active" aria-current="page">
                Kết quả xét nghiệm
            </a>
        </ol>
    </div>
</div>
<div class="container search-container">
    <table class="table table-bordered my-3">

    </table>

    <div class="d-flex justify-content-center">
        <div class='calendar-table-header'>
            {!! Form::open(['route' => 'search', 'class' => 'form-inline']) !!}
            {!! Form::select('code',['request_id'=>'Mã hiến máu', 'cmnd' => 'CMND']
            ,null ,['class'=>'form-control']) !!}
            {!! Form::text('search', null, ['class' => 'form-control', 'required']) !!}
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
                    <th class="text-center">Tình trạng</th>
                    <th class="text-center">Chi tiết kết quả</th>
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
                        {{ $result->requestBlood->calendar->time }}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->user->information->bloodGroup->name}}
                    </td>
                    <td class="text-center">
                        {{ $result->requestBlood->bloodBag->last()->status ? 'Đạt': 'Không đạt' }}
                    </td>
                    <td class="text-center">
                        {!! Form::open
                            (
                                [
                                    'method' => 'post',
                                    'route' => ['mailResult', $result->user->id],
                                ]
                            )
                        !!}
                        {!! Form::submit('Xem chi tiết', ['class' => 'btn btn-sm btn-info'] )!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
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
    <div class="pagination-wrapper">
        {{ $results->links() }}
    </div>
</div>
<script>
$(".btn-info").click(function() {
    return confirm('Đồng ý chúng tôi sẽ gửi mail kết quả cho bạn?');
});
</script>
@endsection
