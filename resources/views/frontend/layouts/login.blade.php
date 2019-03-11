<!-- login -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Đăng nhập</h5>

                    @if (session('login-error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('login-error') }}
                    </div>
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => ['postLogin'], 'id' => 'fe-login']) !!}
                    <div class="form-group">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Mật khẩu:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::button('Đăng nhập', ['class' => 'btn submit mb-4', 'type' => 'submit'])!!}
                    <p class="account-w3ls text-center pb-4">
                        Không có tài khoản?
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">Đăng ký ngay</a>
                    </p>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
