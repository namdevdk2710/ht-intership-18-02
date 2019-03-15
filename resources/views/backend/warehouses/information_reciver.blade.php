<div class="title-request">
    <h4>Thông tin người nhận</h4>
</div>
<div class="infor-request export">
    <div class="col-md-12 export-tr">
        <label class="col-md-4">Họ tên: <span>{{$requests->user->information->name}}</span></label>
        <label class="col-md-4">Ngày sinh: {{$requests->user->information->dob}}</label>
        <label class="col-md-4">Giới tính:
            @if($requests->user->information->gender == 1)
            {{"Nam"}}
            @else
            {{"Nữ"}}
            @endif
        </label>
    </div>
    <div class="col-md-12 export-tr">
        <label class="col-md-4">CMND: {{$requests->user->information->cmnd}}</label>
        <label class="col-md-4">SĐT: {{$requests->user->information->phone}}</label>
        <label class="col-md-4">Địa chỉ: {{$requests->user->information->address}}</label>
    </div>
    <div class="col-md-12 export-tr">
        <label class="col-md-4">Nhóm máu cần: {{$requests->user->information->bloodgroup->name}}</label>
        <label class="col-md-8">Ghi chú: {{$requests->content}}</label>
    </div>
</div>
