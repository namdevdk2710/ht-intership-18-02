<!-- login -->
<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content profile-content">
            <div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="title-profile text-center">Thông tin cá nhân</h4><br>
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
                                display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
                        </div>
                        <div class="col-md-10">
                            @if(!$infor)
                            <div class="row">
                                <div class="col-md-4 infor">
                                    <label class="text-muted">Họ tên:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Ngày sinh:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Giới tính:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">CMND:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Địa chỉ:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">SĐT:</label>
                                    <label class="label-profile"></label><br>
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">Nhóm máu:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Số lần đã hiến:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Số lần đã nhận:</label>
                                    <label class="label-profile"></label><br>
                                    <label class="text-muted">Tình trạng sức khỏe:</label>
                                    <label class="label-profile"></label>
                                </div>
                                @if(Auth::user())
                                <div class="col-md-4">
                                    <label class="text-muted">Username:</label>
                                    <label class="label-profile">{{Auth::user()->username}}</label><br>
                                    <label class="text-muted">Email:</label>
                                    <label class="label-profile">{{Auth::user()->email}}</label>
                                </div>
                                @endif
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-4 infor">
                                    <label class="text-muted">Họ tên:</label>
                                    <label class="label-profile">{{$infor->name}}</label><br>
                                    <label class="text-muted">Ngày sinh:</label>
                                    <label class="label-profile">{{$infor->dob}}</label><br>
                                    <label class="text-muted">Giới tính:</label>
                                    <label class="label-profile">{{$infor->gender}}</label><br>
                                    <label class="text-muted">CMND:</label>
                                    <label class="label-profile">{{$infor->cmnd}}</label><br>
                                    <label class="text-muted">Địa chỉ:</label>
                                    <label class="label-profile">{{$infor->address}}</label><br>
                                    <label class="text-muted">SĐT:</label>
                                    <label class="label-profile">{{$infor->phone}}</label><br>
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">Nhóm máu:</label>
                                    <label class="label-profile">{{$infor->bloodGroup->name}}</label><br>
                                    <label class="text-muted">Số lần đã hiến:</label>
                                    <label class="label-profile"> 4</label><br>
                                    <label class="text-muted">Số lần đã nhận:</label>
                                    <label class="label-profile"> 4</label><br>
                                    <label class="text-muted">Tình trạng sức khỏe:</label>
                                    <label class="label-profile">Tốt</label>
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">Username:</label>
                                    <label class="label-profile">{{Auth::user()->username}}</label><br>
                                    <label class="text-muted">Email:</label>
                                    <label class="label-profile">{{Auth::user()->email}}</label>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    {!! Form::button('Chỉnh sữa', ['class' => 'btn submit mb-4', 'type' => 'submit'])!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
