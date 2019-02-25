@extends('backend.layouts.app')

@section('content')

<div class="outer-w3-agile mt-3">
    <h2 class="tittle-w3-agileits mb-4 title-user">DANH SÁCH NGƯỜI DÙNG</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-color">

            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Quyền người dùng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                        @if($user->role == 1)
                            {{"Quản trị viên"}}
                        @endif

                        @if($user->role == 2)
                            {{"Cơ quan y tế"}}
                        @endif

                        @if($user->role == 0)
                            {{"Người dùng"}}
                        @endif
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection