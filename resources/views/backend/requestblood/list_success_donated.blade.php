@extends('backend.layouts.app')
@section('content')
<div class="request-blood table-responsive">
    <div class="request-blood-header">
        <span class="text-center text-uppercase">Danh sách đăng kí hiến
            máu theo lịch</span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Tên người hiến</th>
                <th scope="col" class="text-center">E-Mail</th>
                <th scope="col" class="text-center text-nowrap">Số điện thoại</th>
                <th scope="col" class="text-center text-nowrap">Địa chỉ</th>
                <th scope="col" class="text-center text-nowrap">Mã túi máu</th>
            </tr>
        </thead>
        <tbody id="body-donated">
            @foreach($requestBloods as $key => $requestBlood)
            <tr>
                <td scope="row" class="text-center">{{ $requestBlood->user->information->name }}</td>
                <td class="text-center">{{ $requestBlood->user->email }}</td>
                <td scope="row" class="text-center">
                    {{ $requestBlood->user->information->phone }}
                </td>
                <td scope="row" class="text-center">
                    {{
                        $requestBlood->user->information->address . ' - ' .
                        $requestBlood->user->information->commune->name .' - ' .
                        $requestBlood->user->information->commune->district->name . ' - ' .
                        $requestBlood->user->information->commune->district->city->name
                    }}
                </td>
                <td scope="row" class="text-center">
                    {{ $requestBlood->id }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $requestBloods->links() }}
    </div>
</div>
@endsection
