@extends('backend.layouts.app')
@section('content')
<div class="request-blood table-responsive">
    <div class="request-blood-header">
        <span class="text-center text-uppercase">Danh sách yêu cầu hiến
            máu</span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Mã hiến máu</th>
                <th scope="col" class="text-center">Tên người hiến</th>
                <th scope="col" class="text-center">E-Mail</th>
                <th scope="col" class="text-center text-nowrap">Thời gian</th>
                <th scope="col" class="text-center text-nowrap">Trạng thái</th>
                <th scope="col" class="text-center text-nowrap">Xác nhận</th>
            </tr>
        </thead>
        <tbody id="body-donated">
            @foreach($requestBloods as $key => $requestBlood)
            <tr>
                <td scope="row" class="text-center">{{ $requestBlood->id }}</td>
                <td scope="row" class="text-center">{{ $requestBlood->user->information->name }}</td>
                <td class="text-center">{{ $requestBlood->user->email }}</td>
                <td class="text-center text-nowrap">
                    {{ $requestBlood->calendar->time }}
                </td>
                @if ($requestBlood->status == true)
                <td scope="row" class="text-center">
                    <strong class="text-success text-nowrap">Đã hiến</strong>
                </td>
                @else
                <td scope="row" class="text-center">
                    <strong class="text-muted text-nowrap">Chưa hiến</strong>
                </td>
                @endif
                <td scope="row" class="text-center">
                    <a href="{{ route('request-bloods.confirm', $requestBlood->id) }}"
                        class="btn-sm btn-primary text-nowrap">
                        Xác nhận
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $requestBloods->links() }}
    </div>
</div>

<script>
$(".btn-primary").click(function() {
    return confirm("Xác nhận đã hiến?");
});
</script>

@endsection
