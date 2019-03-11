<!-- register -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-2">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Đăng ký</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {!! Form::open(['method' => 'POST', 'route' => ['postRegister'], 'id' => 'fe-register']) !!}
                    <div class="form-group">
                        {!! Form::label('Username:') !!}
                        {!! Form::text('username', old('username'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Mật khẩu:') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Mật khẩu:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::button('Đăng ký', ['class' => 'btn submit mb-4', 'type' => 'submit'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //register -->
