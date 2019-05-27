<!-- Modal -->
<div class="modal fade edit-calendar" id="edit-warehouse{{$warehouse->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Sửa kho máu</h4>
            </div>
            <div class="modal-body add-warehouse">
                {!! Form::open
                    (
                        [
                            'method' => 'PUT',
                            'route' => ['warehouses.update', $warehouse->id],
                            'id' =>'edit-warehouse'
                        ]
                    )
                !!}
                <div class="form-group">
                    {!! Form::label('Tên kho máu:', null) !!}
                    <span style="color:red;">*</span>
                    {!! Form::text('name', $warehouse->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Thành phố: ', null) !!}
                    <span style="color:red;">*</span>
                    {!! Form::select
                        (
                            'city',
                            $cities,
                            $warehouse->commune->district->city->id,
                            ['class'=>'form-control']
                        )
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Quận/Huyện: ', null) !!}
                    <span style="color:red;">*</span>
                    {!! Form::select
                        (
                            'district',
                            $warehouse->commune->district->city->districts->pluck('name', 'id')->toArray(),
                            $warehouse->commune->district->id,
                            ['class'=>'form-control']
                        )
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Xã/Phường: ', null) !!}
                    <span style="color:red;">*</span>
                    {!! Form::select
                        (
                            'commune',
                            $warehouse->commune->district->communes->pluck('name', 'id')->toArray(),
                            $warehouse->commune->id,
                            ['class'=>'form-control']
                        )
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Địa chỉ:', null) !!}
                    <span style="color:red;">*</span>
                    {!! Form::text('address', $warehouse->address, ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Sữa', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
