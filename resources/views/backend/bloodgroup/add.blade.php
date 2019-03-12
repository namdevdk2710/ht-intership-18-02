<div class="modal fade" id="add-blood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Thêm nhóm máu</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'bloods.store']) !!}
                <div class="form-group form-blood">
                    {!! Form::label('Tên nhóm máu:') !!}
                    {!! Form::text('name',old('name'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Thêm', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
