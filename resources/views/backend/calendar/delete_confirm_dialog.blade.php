<div class="modal fade" id="del-calendar-{{$calendar->id}}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Bạn chắc chắn muốn xóa!
            </div>
            <div class="modal-footer delete-dialog-footer-custom">
                {!! Form::open(['route' =>
                ['calendar.delete',$calendar->id], 'class' => '']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <button type="button" class="btn-sm btn-default"
                    data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn-sm btn-danger">Đồng ý</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
