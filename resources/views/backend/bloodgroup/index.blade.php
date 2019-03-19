@extends('backend.layouts.app')
@section('content')

<div class="table-responsive blood-table">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-md-10 col-sm-8 col-6">
            Danh sách nhóm máu
        </span>
        <div class="col-md-2 col-sm-4 col-6">
            <a class="btn btn-primary" data-toggle="modal" data-target="#add-blood">
                Thêm nhóm máu
            </a>
            @include('backend.bloodgroup.add')
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">Tên nhóm</th>
                <th class="text-center" scope="col">Hoạt động</th>
            </tr>
        </thead>
        <tbody class="text-center body-bloodgroup">
            @foreach($bloods as $key => $blood)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $blood->name }}</td>
                <td>
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
        if (confirm("Bạn có muốn xóa nhóm máu này?")) {
            var url = '{{ route("bloods.destroy", ":id") }}';
            url = url.replace(':id', $(this).val());
            window.location.href = url;
        }
    });
});
</script>

@endsection
