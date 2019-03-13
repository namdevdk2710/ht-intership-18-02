<!-- Modal -->
<div class="modal fade =edit-calendar" id="exampleModalLong" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Thêm người dùng</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => ['users.store'],'id' =>'addUser']) !!}
                <div class="form-group form-padding">
                    {!! Form::label('Tên người dùng:', null, ['class' => 'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('username', old('username'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Email:', null, ['class' => 'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Mật khẩu:', null, ['class' => 'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Quyền người dùng:', null, ['class' => 'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('role', [''=>'--- Chọn quyền
                        ---', 1 => 'Quản trị viên', 2 => 'Cơ quan y tế', 0 => 'Người dùng'],
                        null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Thêm', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
