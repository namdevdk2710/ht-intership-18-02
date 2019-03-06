<!-- Modal -->
<div class="modal fade" id="add-new-calendar" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin chi tiết</h4>
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
                    {!! Form::label('Quận/huyện: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('district',[''=>'--- Chọn Quận/huyện
                        ---'],null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Xã phường: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('commune',[''=>'--- Chọn Xã phường
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
                <div class="form-group" align="right">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success'])
                    !!}
                    {!! Form::button('close',['class' => 'btn btn-default',
                    'data-dismiss' => 'modal']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
