@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Quản lý tin tức
        </span>
        <div class="col-md-2 col-sm-4 col-6">
            <a class="btn btn-primary" data-toggle="modal" data-target="#postAddModal">
                Thêm tin tức
            </a>
            @include('backend.posts.add')
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã</th>
                <th class="text-center" scope="col">Người đăng</th>
                <th class="text-center" scope="col">Tiêu đề</th>
                <th class="text-center" scope="col">Hình ảnh</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="text-center body-user">
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->information->name}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <img src="{{asset('uploads/images/'.$post->image_url)}}" width="80px" height="50px">
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-warning " class="btn btn-primary" data-toggle="modal"
                        data-target="#postModal{{$post->id}}">
                        Sữa
                    </a>
                    @include('backend.posts.edit')
                    <button type="button" value="{{$post->id}}" class="btn btn-sm btn-danger submit">
                        Xóa
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">

    </div>
</div>

@if ($errors->any())
<script>
    var str = "";
</script>
@foreach($errors->all() as $error)
<script>
    str = str.concat('{{ $error }}' + '\n');
</script>
@endforeach
<script>
    alert(str);
</script>
@endif
@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

<script>
$(document).ready(function() {
    var button = $('.btn-danger');
    button.click(function() {
        if (confirm("Bạn có muốn xóa người dùng này?")) {
            var url = "{{ route('posts.destroy', ':id') }}";
            url = url.replace(':id', $(this).val());
            window.location.href = url;
        }
    });
});
</script>

@endsection
