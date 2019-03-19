@extends('backend.layouts.app')

@section('content')
<div class="table-responsive blood-table">
    <div class="title-request">
        <h4>Cập nhập trạng thái túi máu</h4>
    </div>
    <div class="infor-request export">
        <div class="col-md-12 export-tr">
            <label class="col-md-4">Mã túi máu:
                <span>{{$bloodbag->id}}</span>
            </label>
            <label class="col-md-4">Mã hiến máu:
                <span>{{$bloodbag->requestBlood->id}}</span>
            </label>
            <label class="col-md-4">Người hiến:
                <span>{{$bloodbag->requestBlood->user->information->name}}</span>
            </label>
        </div>
        <div class="col-md-12 export-tr">
            <label class="col-md-4">Nhóm máu:
                <span>{{$bloodbag->requestBlood->user->information->bloodgroup->name}}</span>
            </label>
            <label class="col-md-4">Thể tích:
                <span>{{$bloodbag->unit}}</span>
            </label>
            @php
            $week = strtotime(date("d-m-Y", strtotime($bloodbag->created_at)) . " +6 week");
            $expiryDate = strftime("%d-%m-%Y", $week);
            @endphp
            <label class="col-md-4">Ngày hết hạn:
                <span>{{$expiryDate}}</span>
            </label>
        </div>
        {!! Form::open(['method' => 'POST', 'route' => ['updateStatus', $bloodbag->id]]) !!}
        <div class="col-md-12 export-tr">
            <label class="col-md-4">Kho máu:
                <span>{{$bloodbag->wareHouse->name}}</span>
            </label>
            <div class="col-md-4">
                <label class="">Trạng thái:</label>
                {!! Form::select('note',[ 'Đã nhập kho' => 'Đã nhập kho', 'Hỏng' => 'Hỏng', 'Hết hạn' => 'Hết hạn'],
                ['id' => 'select-warehouse']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12 export-tr" align="right">
        <button type="submit" class="btn btn-sm btn-danger">
            Cập nhập tình trạng
        </button>
    </div>
    {!! Form::close() !!}
</div>

<script>
$(".btn-danger").click(function() {
    return confirm("Bạn có muốn thay đổi trạng thái túi máu này?");
});
</script>

@endsection
