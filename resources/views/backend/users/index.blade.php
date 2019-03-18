@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Danh sách người dùng
        </span>
        <div class="col-md-2 col-sm-4 col-6">
            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Thêm người dùng
            </a>
            @include('backend.users.add')
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Tên người dùng</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Quyền người dùng</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="text-center body-user">
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
                <td>
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#">
                        Chi tiết
                    </a>
                    <a href="" class="btn btn-sm btn-warning " class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModalLong{{$user->id}}">
                        Sữa
                    </a>
                    @include('backend.users.edit')
                    <button type="button" value="{{$user->id}}" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{$users->links()}}
    </div>
</div>

<script>
$(document).ready(function() {
    var button = $('.btn-danger');
    button.click(function() {
        if (confirm("Bạn có muốn xóa người dùng này?")) {
            var url = "{{ route('users.destroy', ':id') }}";
            url = url.replace(':id', $(this).val());
            window.location.href = url;
        }
    });
});
</script>

@endsection
