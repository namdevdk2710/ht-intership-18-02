
<div class="title-request">
    <h4>Danh sách các túi máu đạt yêu cầu</h4>
</div>
<table class="table table-hover">
    <thead>
        <tr class="text-center">
            <th scope="col">STT</th>
            <th scope="col">Mã túi máu</th>
            <th scope="col">Kho</th>
            <th scope="col">Nhóm máu</th>
            <th scope="col">Thể tích</th>
            <th scope="col">Ngày hết hạn</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bloodbags as $key => $bloodbag)

        @if ($bloodbag->requestBlood->user->information->bloodgroup->name
            == $requests->user->information->bloodgroup->name)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$bloodbag->id}}</td>
            <td>{{$bloodbag->wareHouse->name}}</td>
            <td>{{$bloodbag->requestBlood->user->information->bloodgroup->name}}</td>
            <td>{{$bloodbag->unit}}</td>

            @php
            $week = strtotime(date("d-m-Y", strtotime($bloodbag->created_at)) . " +6 week");
            $expiryDate = strftime("%d-%m-%Y", $week);
            @endphp

            <td>{{$expiryDate}}</td>
            <td>
                @php
                    $a= (explode("/", Request::path()));
                @endphp

                {!! Form::open(['method' => 'GET', 'route' => ['confirm-request', end($a), $bloodbag->id]]) !!}
                    {!! Form::button('Xuất', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

<script>
$(".btn-danger").click(function() {
    return confirm("Bạn có muốn xuất túi máu này?");
});
</script>
