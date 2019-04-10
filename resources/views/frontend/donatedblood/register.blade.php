<div class="modal fade" id="register-user-and-calendar{{$calendar->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-0 bg-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Bạn chắc chắn
                    muốn đăng ký </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' =>
            ['requestBlood.postRegisterDonated', $calendar->id,
            ], 'class' => '', 'id' => 'js-register-donated'])
            !!}
            <div class="modal-body mb-4">
                <div class="form-group row mb-0 pb-3">
                    <div class="col-md-6 pb-2">
                        {!! Form::label('E-Mail', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::text('email', null, ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Họ Tên', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Ngày sinh', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::date('gender', null, ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('CMND', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::text('cmnd',null,['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Số điện thoại', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::text('phone',null,['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2 text-left">
                        {!! Form::label('Giới tính', null , ['class' =>
                        'text-dark text-left']) !!}
                        <div class="form-check col-md-3 form-check-inline">
                            {!! Form::radio('gender', 1,['class' => 'form-check-input']) !!}
                            {!! Form::label('Nam', null,['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check col-md-3 form-check-inline">
                            {!! Form::radio('gender', 0,['class' => 'form-check-input']) !!}
                            {!! Form::label('Nữ', null,['class' => 'form-check-label']) !!}
                        </div>
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Thành phố', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::select('cities',[''=>'--- Chọn Thành
                        phố---']+$cities ,null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Quận/huyện', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::select(
                        'districts',
                        [''=>'--- Chọn Quận/Huyện---'],
                        null,
                        ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Xã/phường', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::select(
                        'communes',
                        [''=>'--- Chọn Xã/Phường---'],
                        null,
                        ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6 pb-2">
                        {!! Form::label('Địa chỉ', null , ['class' =>
                        'text-dark text-left']) !!}
                        {!! Form::text('address',null,['class'=>'form-control'])
                        !!}
                    </div>
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
