<div class="modal fade" id="edit-blood{{$blood->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Chỉnh sữa nhóm máu</h4>
            </div>
            <div class="modal-body" id="modal-blood">
                {!! Form::open(['method' => 'PUT', 'route' => ['bloods.update', $blood->id]]) !!}
                <div class="form-group">
                    {!! Form::label('Tên nhóm máu:') !!}
                    {!! Form::text('name', $blood->name, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Sữa', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
