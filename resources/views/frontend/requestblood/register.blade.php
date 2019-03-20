<div class="modal fade" id="register-user-and-calendar{{$calendar->id}}"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-0 bg-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Bạn chắc chắn
                    muốn đăng ký </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' =>
            ['requestBlood.postRegisterDonated', $calendar->id], 'class' => ''])
            !!}
            <div class="modal-body mb-4">
                <div class="form-group mb-0 pb-3">
                    {!! Form::label('E-Mail', null , ['class' =>
                    'text-dark text-left']) !!}
                    {!! Form::text('email',null,['class'=>'form-control'])
                    !!}
                    {!! Form::label('Họ Tên', null , ['class' =>
                    'text-dark text-left']) !!}
                    {!! Form::text('name',null,['class'=>'form-control'])
                    !!}
                    {!! Form::label('Cmnd', null , ['class' =>
                    'text-dark text-left']) !!}
                    {!! Form::text('cmnd',null,['class'=>'form-control'])
                    !!}
                    {!! Form::label('phone', null , ['class' =>
                    'text-dark text-left']) !!}
                    {!! Form::text('phone',null,['class'=>'form-control'])
                    !!}
                </div>
                <div class="form-check form-check-inline float-left">
                    {!! Form::radio('gender', 1,['class' => 'form-check-input']) !!}
                    {!! Form::label('Nam', null,['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check form-check-inline float-left">
                    {!! Form::radio('gender', 0,['class' => 'form-check-input']) !!}
                    {!! Form::label('Nữ', null,['class' => 'form-check-label']) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button('Hủy', ['class' => 'btn-sm btn-secondary',
                'type'=>'button', 'data-dismiss'=>'modal']) !!}
                {!! Form::button('Đăng ký', ['class' => 'btn-sm btn-info',
                'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
