<table class="table" id="import-user-info">
    <tbody>
        <tr>
            <td class="col-sm-6">
                <div id="js-import-user-code">
                    <span class="col-sm-4">Nhập mã số</span>
                    {!! Form::text('request_blood_id', null, ['class' => 'col-sm-4'])
                    !!}
                    <input type="button" value="Lấy thông tin" id="js-import-user-getinfo">
                </div>
            </td>
            <td class="col-sm-6">
                <div class="import-user-info-code-error">
                    <span
                        class="glyphicon glyphicon-exclamation-sign text-danger"
                        aria-hidden="true"></span>
                    <span class="sr-only text-danger">Error:</span>
                    <span class="text-danger">Mã số nhập vào không hợp
                        lệ.</span>
                </div>
                <div class="import-user-info-code-error" id="js-import-bloodbag-no-request">
                    <span
                        class="glyphicon glyphicon-exclamation-sign text-danger"
                        aria-hidden="true"></span>
                    <span class="sr-only text-danger">Error:</span>
                    <span class="text-danger">Không tồn tại mã hiến máu này.</span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Họ tên</span>
                <h4 class="col-sm-8 import-user-info-name"></h4>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Nhóm máu</span>
                <h4 class="col-sm-8 import-user-info-blood"></h4>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Ngày sinh</span>
                <h4 class="col-sm-8 import-user-info-birthday"></h4>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Giới tính</span>
                <h4 class="col-sm-8 import-user-info-gender"></h4>
            </td>
        </tr>
        <tr>
            <td class="col-sm-6">
                <span class="col-sm-4">Số CMTND</span>
                <h4 class="col-sm-8 import-user-info-cmnd"></h4>
            </td>
            <td class="col-sm-6">
                <span class="col-sm-4">Ngày lấy máu</span>
                <h4 class="col-sm-8 import-user-info-time"></h4>
            </td>
        </tr>
    </tbody>
</table>
