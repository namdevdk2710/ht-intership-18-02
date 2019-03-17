@extends('backend.layouts.app')

@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-12 col-sm-8 col-6">
            Danh sách túi máu có thể nhập kho
        </span>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã túi máu</th>
                <th class="text-center" scope="col">Người hiến</th>
                <th class="text-center" scope="col">Nhóm máu</th>
                <th class="text-center" scope="col">Thể tích</th>
                <th class="text-center" scope="col">Thao tác</th>
            </tr>
        </thead>

        <tbody class="body-user">
            @foreach($bloodBags as $key => $bloodBag)
            <tr class="text-center">
                <td></td>
                <td>{{$bloodBag->id}}</td>
                <td>{{$bloodBag}}</td>
                <td>
                    <button type="button" value="   " class="btn btn-sm btn-danger">
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
