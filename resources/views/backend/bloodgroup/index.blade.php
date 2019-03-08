@extends('backend.layouts.app')
@section('content')

<div class="table-responsive blood-table">
    <h2 class="text-center">Danh sách nhóm máu</h2>
    <div align="right">
        <button class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#add-blood">Thêm nhóm máu
        </button>
    </div>
    @include('backend.bloodgroup.add')
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Tên nhóm</th>
                <th class="text-center" scope="col">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bloods as $key => $blood)
            <tr>
                <td class="text-center">{{ $key +1 }}</td>
                <td class="text-center">{{ $blood->name }}</td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-blood{{$blood->id}}"
                        type="button">
                        Sửa
                    </a>
                    <button type="button" value="{{$blood->id}}" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </td>
            </tr>
            @include('backend.bloodgroup.edit')
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
