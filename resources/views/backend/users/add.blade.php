    <div align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm người dùng
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                    <div class="form-group">
                        {!! Form::label('Tên người dùng:') !!}
                        {!! Form::text('username',old('username'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email',old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Mật khẩu:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Quyền người dùng:') !!}
                        {!! Form::select('role' ,['1' => 'Admin', '2' => 'Staff', '0' => 'Người dùng']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Đóng', ['class' => 'btn btn-secondary'], ['data-dismiss' => 'modal'])!!}
                    {!! Form::submit('Thêm', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
