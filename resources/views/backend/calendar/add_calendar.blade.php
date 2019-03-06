<!-- Modal -->
<div class="modal fade add-calendar" id="add-new-calendar" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Thông tin chi tiết</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'calendar.postAddCalendar', 'id' => 'js-add-calendar-form']) !!}
                <div class="form-group form-padding">
                    {!! Form::label('Thời gian: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!!
                        Form::time('time',now(),['class'=>'form-control'])!!}
                    </div>
                    <div class="col-sm-4">
                        {!!
                        Form::date('date',now(),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Thành phố: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('city',[''=>'--- Chọn Thành
                        phố---']+$cities ,null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Quận/Huyện: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('district',[''=>'--- Chọn Quận/Huyện
                        ---'],null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Xã/Phường: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('commune',[''=>'--- Chọn Xã/Phường
                        ---'],null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Địa điểm: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('address',null,['class'=>'form-control'])
                        !!}
                    </div>
                </div>
                <div class="form-group form-padding padding-x-15 margin-bottom-0" align="right">
                    {!! Form::button('Hủy',['class' => 'btn btn-default',
                    'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary'])
                    !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
