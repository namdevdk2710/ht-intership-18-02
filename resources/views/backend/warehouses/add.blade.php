<!-- Modal -->
<div class="modal fade edit-calendar" id="add-warehouse" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Thêm kho máu</h4>
            </div>
            <div class="modal-body add-warehouse">
                {!! Form::open(['method' => 'POST', 'route' => ['warehouses.store'],'id' =>'add-warehouse']) !!}
                <div class="form-group">
                    {!! Form::label('Tên kho máu:', null) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Địa chỉ:', null) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Thêm', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
