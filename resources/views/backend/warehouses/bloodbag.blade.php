@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Danh sách túi máu trong kho
        </span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã túi máu</th>
                <th class="text-center" scope="col">Mã hiến máu</th>
                <th class="text-center" scope="col">Người hiến</th>
                <th class="text-center" scope="col">Nhóm máu</th>
                <th class="text-center" scope="col">Thể tích</th>
                <th class="text-center" scope="col">Ngày hết hạn</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody class="body-user">
            @foreach($bloodbags as $bloodbag)
            <tr class="text-center">
                <td>{{$bloodbag->id}}</td>
                <td>{{$bloodbag->requestBlood->id}}</td>
                <td>{{$bloodbag->requestBlood->user->information->name}}</td>
                <td>{{$bloodbag->requestBlood->user->information->bloodgroup->name}}</td>
                <td>{{$bloodbag->unit}}</td>
                @php
                    $week = strtotime(date("d-m-Y", strtotime($bloodbag->created_at)) . " +6 week");
                    $expiryDate = strftime("%d-%m-%Y", $week);
                @endphp
                <td>{{$expiryDate}}</td>
                <td>
                    <a type="button" href="{{route('blood-bags.updateStatus', $bloodbag->id)}}"  class="btn btn-sm btn-danger">
                        Cập nhập tình trạng
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">

    </div>
</div>

@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

@endsection
