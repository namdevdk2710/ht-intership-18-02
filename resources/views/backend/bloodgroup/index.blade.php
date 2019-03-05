@extends('backend.layouts.app')
@section('content')

<div class="table-responsive calendar-table">
    <h2 class="text-center">Danh sách nhóm máu</h2>
    <div align="right">
        <button class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#add-blood">Thêm nhóm máu
        </button>
    </div>
    @include('backend.bloodgroup.add')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên nhóm</th>
                <th scope="col">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bloods as $key => $blood)
            <tr>
                <th scope="row">{{ $key +1 }}</th>
                <td>{{ $blood->id }}</td>
                <td>{{ $blood->name }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-blood{{$blood->id}}"
                        type="button">
                        Sửa
                    </a>
                    @include('backend.bloodgroup.edit')
                    <button type="button" value="{{$blood->id}}" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $bloods->links() }}
    </div>
</div>

<script>
    $(document).ready(function() {
        var button = $('.btn-danger');
        button.click(function() {
            if (confirm("Bạn có muốn xóa nhóm máu này?")) {
                var url = '{{ route("bloods.destroy", ":id") }}';
                url = url.replace(':id', $(this).val());
                window.location.href = url;
            }
        });
    });
</script>

@endsection
