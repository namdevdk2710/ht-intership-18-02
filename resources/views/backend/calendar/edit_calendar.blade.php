<!-- Modal -->
<div class="modal fade" id="edit-calendar-{{$calendar->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin chi tiết</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['calendar.update', $calendar->id], 'id' => 'js-edit-calendar-form']) !!}
                {{ Form::hidden('_method', 'PUT') }}
                <div class="form-group form-padding">
                    {!! Form::label('Thời gian: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!!
                        Form::time('time', date('H:m', strtotime($calendar->time)) , ['class'=>'form-control'])!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::date('date', date('Y-m-d', strtotime($calendar->time)) , ['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Thành phố: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('city', $cities
                        ,$calendar->commune->district->city->id ,
                        ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Quận/huyện: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('district', $calendar->commune->district->city->districts->pluck('name', 'id')->toArray(),
                        $calendar->commune->district->id,
                        ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Xã phường: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('commune', $calendar->commune->district->communes->pluck('name', 'id')->toArray(),
                        $calendar->commune->id,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group form-padding">
                    {!! Form::label('Địa điểm: ', null , ['class' =>
                    'col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('address', $calendar->address,
                        ['class'=>'form-control'])
                        !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button('Hủy',['class' => 'btn btn-default',
                'data-dismiss' => 'modal']) !!}
                {!! Form::submit('Cập nhật', ['class' => 'btn btn-success'])
                !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
