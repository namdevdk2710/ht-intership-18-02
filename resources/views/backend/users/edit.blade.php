<div class="modal fade" id="exampleModalLong{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title-modal" id="exampleModalLongTitle">Sữa người dùng</h3>
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

                    {!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id], 'class' => 'editUser']) !!}
                    <div class="form-group">
                        {!! Form::label('Tên người dùng:') !!}
                        {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Quyền người dùng:') !!}
                        {!! Form::select('role' , ['1' => 'Quản trị viên',
                            '2' => 'Cơ quan y tế', '0' => 'Người dùng'], $user->role, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Đóng', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal'])!!}
                    {!! Form::submit('Sữa', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
