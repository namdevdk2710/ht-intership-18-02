<!-- Modal -->
<div class="modal fade detail-calendar" id="showDetailCalendar{{$calendar->id}}"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin chi tiết</h4>
            </div>
            <div class="modal-body">
                {!! Form::open() !!}
                <div class="form-group form-padding">
                    {!! Form::label('Người đăng:',null , ['class' => 'col-sm-3
                    control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('user',$calendar->user->username ,
                        ['class'
                        => 'form-control',
                        'disabled' => true ]) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Số lượng đăng ký:',null , ['class' =>
                    'col-sm-3
                    control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text(null,$calendar->requestBloods->count() ,
                        ['class' =>
                        'form-control',
                        'disabled' => true ]) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Thời gian:',null , ['class' => 'col-sm-3
                    control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('time',$calendar->time , ['class' =>
                        'form-control',
                        'disabled' => true ]) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Tình trạng:',null , ['class' => 'col-sm-3
                    control-label']) !!}
                    <div class="col-sm-9">
                        @if ((new Datetime($calendar->time)) > now())
                        {!! Form::text(null, 'Sắp diễn ra', ['class' =>
                        'form-control text-success',
                        'disabled' => true ]) !!}
                        @else
                        {!! Form::text(null, 'Đã quá hạn', ['class' =>
                        'form-control text-danger',
                        'disabled' => true ]) !!}
                        @endif
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Địa điểm:',null , ['class' => 'col-sm-3
                    control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('address',$add , ['class'
                        => 'form-control',
                        'disabled' => true ]) !!}
                    </div>
                </div>
                <div class="form-group form-padding padding-x-15 margin-bottom-0"
                    align="right">
                    {!! Form::button('Đóng',['class' => 'btn btn-default',
                    'data-dismiss' => 'modal']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
