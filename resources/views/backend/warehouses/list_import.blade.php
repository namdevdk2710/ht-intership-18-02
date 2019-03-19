@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-12 col-sm-8 col-6">
            Danh sách túi máu có thể nhập kho
        </span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã túi máu</th>
                <th class="text-center" scope="col">Người hiến</th>
                <th class="text-center" scope="col">Nhóm máu</th>
                <th class="text-center" scope="col">Thể tích</th>
                <th class="text-center" scope="col">Trạng thái</th>
                <th class="text-center" scope="col">Chọn kho nhập</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="body-user">
            @foreach($bloodBags as $bloodBag)

            {!! Form::open(['method' => 'POST', 'route' => ['import-loods', $bloodBag->id]]) !!}
            <tr class="text-center">
                <td>{{$bloodBag->id}}</td>
                <td>{{$bloodBag->requestBlood->user->information->name}}</td>
                <td>{{$bloodBag->requestBlood->user->information->bloodGroup->name}}</td>
                <td>{{$bloodBag->unit}}</td>
                <td>Đạt yêu cầu</td>
                <td>
                    <select name="warehouse_id" id="select-warehouse">
                        @foreach($warehouses as $warehouse )
                        <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    {!! Form::button('Nhập kho', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                </td>
            </tr>
            {!! Form::close() !!}

            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{$bloodBags->links()}}
    </div>
</div>

@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

<script>
$(".btn-danger").click(function() {
    return confirm("Bạn có muốn nhập túi máu này vào kho?");
});
</script>

@endsection
