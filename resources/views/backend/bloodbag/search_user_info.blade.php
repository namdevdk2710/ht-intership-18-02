<table class="table" id="search-user-info">
    <tbody>
        <tr>
            <td class="col-sm-6">
                <div id="js-search-user-code">
                    <span class="col-sm-4">Nhập mã số</span>
                    {!! Form::text('request_blood_id', null, ['class' =>
                    'col-sm-4'])
                    !!}
                    <input type="button" value="Tra cứu"
                        id="js-bloodbag-search">
                </div>
            </td>
            <td class="col-sm-6">
                <div class="search-user-info-code-error">
                    <span
                        class="glyphicon glyphicon-exclamation-sign text-danger"
                        aria-hidden="true"></span>
                    <span class="sr-only text-danger">Error:</span>
                    <span class="text-danger">Mã số nhập vào không hợp
                        lệ.</span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Họ tên</span>
                <h5 class="col-sm-8 search-user-info-name"></h5>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Nhóm máu</span>
                <h5 class="col-sm-8 search-user-info-blood"></h5>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Ngày sinh</span>
                <h5 class="col-sm-8 search-user-info-birthday"></h5>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Giới tính</span>
                <h5 class="col-sm-8 search-user-info-gender"></h5>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Số CMTND</span>
                <h5 class="col-sm-8 search-user-info-cmnd"></h5>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Ngày lấy máu</span>
                <h5 class="col-sm-8 search-user-info-time"></h5>
            </td>
        </tr>
    </tbody>
</table>
