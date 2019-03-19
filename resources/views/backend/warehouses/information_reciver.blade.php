<div class="title-request">
    <h4>Thông tin người nhận</h4>
</div>
<div class="infor-request export">
    <div class="col-md-12 export-tr">
        <label class="col-md-4">Họ tên:
            <span class="span-color">{{$requests->user->information->name}}</span>
        </label>
        <label class="col-md-4">Ngày sinh:
            <span class="span-color">{{$requests->user->information->dob}}</span>
        </label>
        <label class="col-md-4">Giới tính:
            <span class="span-color">
                @if($requests->user->information->gender == 1)
                {{"Nam"}}
                @else
                {{"Nữ"}}
                @endif
            </span>
        </label>
    </div>
    <div class="col-md-12 export-tr">
        <label class="col-md-4">CMND:
            <span class="span-color">{{$requests->user->information->cmnd}}</span>
        </label>
        <label class="col-md-4">SĐT:
            <span class="span-color">{{$requests->user->information->phone}}</span>
        </label>
        <label class="col-md-4">Địa chỉ:
            <span class="span-color">{{$requests->user->information->address}}</span>
        </label>
    </div>
    <div class="col-md-12 export-tr">
        <label class="col-md-4">Nhóm máu cần:
            <span class="span-color">{{$requests->user->information->bloodgroup->name}}</span>
        </label>
        <label class="col-md-8">Ghi chú:
            <span class="span-color">{{$requests->content}}</span>
        </label>
    </div>
</div>
