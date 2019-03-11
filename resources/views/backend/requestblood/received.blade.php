@extends('backend.layouts.app')
@section('content')
<div class="request-blood table-responsive">
    <div class="request-blood-header">
        <span class="text-center text-uppercase">Danh sách yêu cầu nhận
            máu</span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Stt</th>
                <th scope="col" class="text-center">E-Mail</th>
                <th scope="col" class="text-center text-nowrap">Trạng thái</th>
                <th scope="col" class="text-center">Nội dung</th>
                <th scope="col" class="text-center text-nowrap">Thời gian</th>
                <th scope="col" class="text-center text-nowrap">Xác nhận</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requestBloods as $key => $requestBlood)
            <tr>
                <td scope="row" class="text-center">{{ $key +1 }}</td>
                <td class="text-left">{{ $requestBlood->user->email }}</td>
                @if ($requestBlood->status == true)
                <td scope="row" class="text-center">
                    <strong class="text-success text-nowrap">Đã nhận</strong>
                </td>
                @else
                <td scope="row" class="text-center">
                    <strong class="text-muted text-nowrap">Chưa nhận</strong>
                </td>
                @endif
                <td class="text-left">{{ $requestBlood->content }}</td>
                <td class="text-left text-nowrap">
                    {{ $requestBlood->calendar->time }}</td>
                @if ($requestBlood->status == true)
                <td scope="row" class="text-center">
                    <a href="" class="btn-sm btn-warning  text-nowrap">
                        Hủy xác nhận
                    </a>
                </td>
                @else
                <td scope="row" class="text-center"><a href=""
                        class="btn-sm btn-primary text-nowrap">
                        Xác nhận
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $requestBloods->links() }}
    </div>
</div>
@endsection
