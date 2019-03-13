$(document).ready(function () {
    $("select[name='city']").on('change', function() {
        var city_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "/admin/calendar/showDistrictInCity",
            method: 'POST',
            data: {
                city_id: city_id,
                _token: token,
            },
            success: function(data) {
                $("select[name='district'").html('');
                $.each(data, function(key, value) {
                    $("select[name='district']").append(
                        "<option value=" + key + ">" + value +
                        "</option>"
                        );
                });
            }
        });
    });

    $("select[name='district']").change(function() {
        var district_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "/admin/calendar/showCommuneInDistrict",
            method: 'POST',
            data: {
                district_id: district_id,
                _token: token,
            },
            success: function(data) {
                $("select[name='commune'").html('');
                $.each(data, function(key, value) {
                    console.log(key);
                    $("select[name='commune']").append(
                        "<option value=" + key + ">" + value +
                        "</option>"
                        );
                });
            }
        });
    });

    $('#js-edit-calendar-form').validate({
        rules: {
            time: {
                required: true,
            },
            date: {
                required: true,
                date: true,
            },
            city: "required",
            district: "required",
            commune: "required",
            address: "required",
        },
        messages: {
            time: {
                required: "Trường này phải có dữ liệu",
            },
            date: {
                required: "Trường này phải có dữ liệu",
                date: "Nhập đúng định dạng",
            },
            city: {
                required: "Trường này phải có dữ liệu",
            },
            district: {
                required: "Trường này phải có dữ liệu",
            },
            commune: {
                required: "Trường này phải có dữ liệu",
            },
            address: {
                required: "Trường này phải có dữ liệu",
            },
        }
    });

    $('#js-add-calendar-form').validate({
        rules: {
            time: {
                required: true,
            },
            date: {
                required: true,
                date: true
            },
            city: "required",
            district: "required",
            commune: "required",
            address: "required",
        },
        messages: {
            time: {
                required: "Trường này phải có dữ liệu",
            },
            date: {
                required: "Trường này phải có dữ liệu",
                date: "Nhập đúng định dạng",
            },
            city: {
                required: "Trường này phải có dữ liệu",
            },
            district: {
                required: "Trường này phải có dữ liệu",
            },
            commune: {
                required: "Trường này phải có dữ liệu",
            },
            address: {
                required: "Trường này phải có dữ liệu",
            },
        }
    });

    $('#fe-login').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Trường này phải có dữ liệu",
                email: "Email không hợp lệ",
            },
            password: {
                required: "Trường này phải có dữ liệu",
            },
        }
    });
    $('#js-import-user-code #js-import-user-getinfo').click(function (e) {
        e.preventDefault();
        var code = $('#js-import-user-code input[name ="request_blood_id"]').val();
        if (Math.floor(code) == code && $.isNumeric(code)) {
            $('#import-user-info .import-user-info-code-error').hide();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/blood-bags/getInfoByCode",
                method: 'POST',
                data: {
                    request_id: code,
                    _token: token,
                },
                success: function (data) {
                    $('#import-user-info .import-user-info-name').text(data.fullname);
                    $('#import-user-info .import-user-info-birthday').text(data.birthday);
                    $('#import-user-info .import-user-info-gender').text(data.gender);
                    $('#import-user-info .import-user-info-cmnd').text(data.cmnd);
                    $('#import-user-info .import-user-info-time').text(data.time);
                    $('#import-user-info .import-user-info-blood').text(data.blood);
                }
            });
        } else {
            $('#import-user-info .import-user-info-code-error').show();
            $('#js-import-user-code input[name ="request_blood_id"]').val('');
        }
    })
});
