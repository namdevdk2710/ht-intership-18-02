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
                <th scope="col" class="text-center">Mã yêu cầu</th>
                <th scope="col" class="text-center">E-Mail</th>
                <th scope="col" class="text-center">Họ tên</th>
                <th scope="col" class="text-center">Địa chỉ</th>
                <th scope="col" class="text-center text-nowrap">Giới tính</th>
                <th scope="col" class="text-center">Số điện thoại</th>
                <th scope="col" class="text-center text-nowrap">Thao tác</th>
            </tr>
        </thead>
        <tbody id="body-received">
            @foreach($requestBloods as $key => $requestBlood)
            <tr>
                <td scope="row" class="text-center">{{ $requestBlood->id }}</td>
                <td scope="row" class="text-center">{{ $requestBlood->user->email }}</td>
                <td scope="row" class="text-center">{{ $requestBlood->user->information->name }}</td>
                <td scope="row" class="text-center">
                {{
                    $requestBlood->user->information->address.'-'.
                    $requestBlood->user->information->commune->name.'-'.
                    $requestBlood->user->information->commune->district->name.'-'.
                    $requestBlood->user->information->commune->district->city->name
                }}
                </td>
                @if ($requestBlood->user->information->gender == 1)
                <td scope="row" class="text-center">Nam</td>
                @else
                <td scope="row" class="text-center">Nữ</td>
                @endif
                <td scope="row" class="text-center">{{ $requestBlood->user->information->phone }}</td>
                @if ($requestBlood->status == 1)
                <td scope="row" class="text-center">
                @foreach($requestBlood->diaries as $diaries)
                    {{count($requestBlood->diaries).'  '.'túi'.'('.$diaries->blood_bag_id.','.')'}}
                @endforeach
                </td>
                @else
                <td scope="row" class="text-center">
                    <a class= "btn-sm btn-primary text-nowrap" href="{{route('export-request', $requestBlood->id)}}">
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

@if (session('success'))
<script>
alert("{{ session('success') }}");
</script>
@endif
@endsection
