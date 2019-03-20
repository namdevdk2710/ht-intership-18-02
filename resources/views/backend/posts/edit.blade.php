<div class="modal fade" id="postModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Thêm tin tức</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'PUT', 'route' => ['posts.update', $post->id], 'files' => true
                    , 'class' => 'form-blood']) !!}
                <div class="form-group text-left">
                    {!! Form::label('Tiêu đề:') !!}
                    {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group text-left">
                    {!! Form::label('Nội dung:') !!}
                    {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'id' => 'editor1']) !!}
                </div>
                <div class="form-group text-left">
                    {!! Form::label('Hình ảnh:') !!}
                    {!! Form::file('image_url', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button('Đóng', ['class' => 'btn btn-secondary','data-dismiss' => 'modal'] )!!}
                {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary', 'id' => 'submitForm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
