@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Danh sách kho máu
        </span>
        <div class="col-md-2 col-sm-4 col-6">
            <a class="btn btn-primary" data-toggle="modal" data-target="#add-warehouse">
                Thêm kho máu
            </a>
            @include('backend.warehouses.add')
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Tên kho</th>
                <th class="text-center" scope="col">Địa chỉ</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="body-user">
            @foreach($warehouses as $key => $warehouse)
            <tr class="text-center">
                <td>{{$key + 1}}</td>
                <td>{{$warehouse->name}}</td>
                <td>{{$warehouse->address}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning " class="btn btn-primary" data-toggle="modal"
                        data-target="#edit-warehouse{{$warehouse->id}}">
                        Sữa
                    </a>
                    <button type="button" value="{{$warehouse->id}}" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </td>
            </tr>
            @include('backend.warehouses.edit')
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{$warehouses->links()}}
    </div>
</div>

<script>
$(document).ready(function() {
    var button = $('.btn-danger');
    button.click(function() {
        if (confirm("Bạn có muốn xóa kho máu này?")) {
            var url = "{{ route('warehouses.destroy', ':id') }}";
            url = url.replace(':id', $(this).val());
            window.location.href = url;
        }
    });
});
</script>

@endsection
