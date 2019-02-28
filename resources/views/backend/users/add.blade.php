    <div align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm người dùng
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title-modal" id="exampleModalLongTitle">Thêm người dùng</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal-body">

                    {!! Form::open(['method' => 'POST', 'route' => ['users.store'],'id' =>'addUser']) !!}
                    <div class="form-group col-md-6">
                        {!! Form::label('Tên người dùng:') !!}
                        {!! Form::text('username',old('username'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email',old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Mật khẩu:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6 ">
                        {!! Form::label('Quyền người dùng:') !!}<br>
                        {!! Form::select('role' ,['1' => 'Quản trị viên', '2' => 'Cơ quan y tế', '0' => 'Người dùng'], null,
                            ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Họ và tên:') !!}
                        {!! Form::text('name',old('name'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Giới tính:') !!} <br>
                        {!! Form::select('gender' ,['1' => 'Nam', '0' => 'Nữ'], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Ngày sinh:') !!}
                        {!! Form::date('dob',old('dob'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('CMND:') !!}
                        {!! Form::text('cmnd',old('cmnd'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Thành phố:') !!}
                        {!! Form::text('email',old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Huyện/xã:') !!}
                        {!! Form::text('email',old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Số nhà:') !!}
                        {!! Form::text('address',old('address'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Số điện thoại:') !!}
                        {!! Form::text('address',old('address'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('Nhóm máu:') !!}
                        {!! Form::text('address',old('address'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                    {!! Form::submit('Thêm', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
