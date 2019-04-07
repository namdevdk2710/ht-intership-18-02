@extends('backend.layouts.app')
@section('content')
<div class="table-responsive blood-bag">
    <div class='calendar-table-header'>
        <span class="calendar-table-header-title text-center text-uppercase col-12">
            Nhập kết quả xét nghiệm
        </span>
    </div>
    <div class="row">
    </div>
    {!! Form::open(['method' => 'POST', 'route' => 'blood-bags.store' ]) !!}
    <div class="import-title">
        <span>
            Thông tin người hiến máu
        </span>
    </div>
    @include('backend.bloodbag.user_info')
    <div class="import-title">
        <span>
            Nhập Kết quả
        </span>
    </div>
    @include('backend.bloodbag.result')
    <div>
        {!! Form::submit('Lưu lại', ['class' => 'btn-sm btn-primary
        import-submit', 'id' => 'js-import-bloodbag-result-submit']) !!}
    </div>
    {!! Form::close() !!}
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
@endsection
