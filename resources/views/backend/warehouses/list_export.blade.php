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
                <th scope="col" class="text-center">Mã</th>
                <th scope="col" class="text-center">E-Mail</th>
                <th scope="col" class="text-center text-nowrap">Trạng thái</th>
                <th scope="col" class="text-center">Nội dung</th>
                <th scope="col" class="text-center text-nowrap">Thời gian</th>
                <th scope="col" class="text-center text-nowrap">Xác nhận</th>
            </tr>
        </thead>
        <tbody id= "body-received">
            @foreach($requestBloods as $key => $requestBlood)
            <tr>
                <td scope="row" class="text-center">{{ $requestBlood->id }}</td>
                <td class="text-center">{{ $requestBlood->user->email }}</td>
                @if ($requestBlood->status == 1)
                <td scope="row" class="text-center">
                    <strong class="text-success text-nowrap">Đã nhận</strong>
                </td>
                @else
                <td scope="row" class="text-center">
                    <strong class="text-muted text-nowrap">Chưa nhận</strong>
                </td>
                @endif
                <td class="text-center">{{ $requestBlood->content }}</td>
                <td class="text-center text-nowrap">
                    {{ $requestBlood->created_at }}</td>
                <td scope="row" class="text-center">
                    <a href="{{route('export-request', $requestBlood->id)}}"
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

@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

@endsection
