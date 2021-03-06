@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <h3 class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Danh sách kho máu
        </h3    >
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
                <th class="text-center" scope="col">Mã kho</th>
                <th class="text-center" scope="col">Tên kho</th>
                <th class="text-center" scope="col">Địa chỉ</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="body-user">
            @foreach($warehouses as $warehouse)
            <tr class="text-center">
                <td>{{$warehouse->id}}</td>
                <td>{{$warehouse->name}}</td>
                <td>
                    {{
                        $warehouse->address
                        ."-".
                        $warehouse->commune->name
                        ."-".
                        $warehouse->commune->district->name
                        ."-".
                        $warehouse->commune->district->city->name
                    }}
                </td>
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
        if (confirm("Bạn có muốn xóa kho máu này?")) {
            var url = "{{ route('warehouses.destroy', ':id') }}";
            url = url.replace(':id', $(this).val());
            window.location.href = url;
        }
    });
});
</script>

@endsection
