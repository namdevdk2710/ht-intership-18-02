<div class="modal fade" id="register-calendar{{$calendar->id}}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content p-0 bg-white">
            <div class="modal-header">
                Bạn chắc chắn muốn đăng ký !
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' =>
                ['requestBlood.postRegisterDonated', $calendar->id], 'class' =>
                '']) !!}
                {!! Form::button('Hủy', ['class' => 'btn-sm btn-secondary',
                'type'=>'button', 'data-dismiss'=>'modal']) !!}
                {!! Form::button('Đăng ký', ['class' => 'btn-sm btn-info',
                'type'=>'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
