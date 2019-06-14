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
                    // console.log(key);
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
            name: "required",
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
            name: {
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
            name: "required",
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
            name: {
                required: "Trường này phải có dữ liệu",
            },
        }
    });

    $('#edit-warehouse').validate({
        rules: {
            city: "required",
            district: "required",
            commune: "required",
            address: "required",
            name: "required",
        },
        messages: {
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
            name: {
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
                    console.log(data.hasRequest);
                    if (!data.hasRequest) {
                        $('#js-import-bloodbag-no-request').show();
                    } else {
                        $('#js-import-bloodbag-no-request').hide();
                        $('#import-user-info .import-user-info-name').text(data.fullname);
                        $('#import-user-info .import-user-info-birthday').text(data.birthday);
                        $('#import-user-info .import-user-info-gender').text(data.gender);
                        $('#import-user-info .import-user-info-cmnd').text(data.cmnd);
                        $('#import-user-info .import-user-info-address').text(data.address);
                        $('#import-user-info .import-user-info-blood').text(data.blood);
                        if (data.hasBag) {
                            $('#js-import-bloodbag-result').hide();
                            $('#js-import-bloodbag-result-submit').hide();
                            $('#js-import-bloodbag-no-result').show();
                        } else {
                            $('#js-import-bloodbag-result').show();
                            $('#js-import-bloodbag-result-submit').show();
                            $('#js-import-bloodbag-no-result').hide();
                        }
                    }
                }
            });
        } else {
            $('#import-user-info .import-user-info-code-error').show();
            $('#js-import-user-code input[name ="request_blood_id"]').val('');
        }
    });

    $('#js-search-user-code #js-bloodbag-search').click(function (e) {
        e.preventDefault();
        var code = $('#js-search-user-code input[name ="request_blood_id"]').val();
        if (Math.floor(code) == code && $.isNumeric(code)) {
            $('#search-user-info .search-user-info-code-error').hide();
            var token = $("input[name='_token']").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/blood-bags/search-blood-bag",
                method: 'GET',
                data: {
                    request_id: code,
                    _token: token,
                },
                success: function (data) {
                    console.log(data);
                    $('#search-user-info .search-user-info-name').text(data.fullname);
                    $('#search-user-info .search-user-info-birthday').text(data.birthday);
                    $('#search-user-info .search-user-info-gender').text(data.gender);
                    $('#search-user-info .search-user-info-cmnd').text(data.cmnd);
                    $('#search-user-info .search-user-info-address').text(data.address);
                    $('#search-user-info .search-user-info-blood').text(data.blood);

                    if (data.exist) {
                        $('#js-search-bloodbag-result').show();
                        $('#js-search-bloodbag-no-result').hide();
                        $('.search-result-hbsag').text(data.hbsag);
                        $('.search-result-antihiv').text(data.antihiv);
                        $('.search-result-antihcv').text(data.antihcv);
                        $('.search-result-hbvnat').text(data.hbvnat);
                        $('.search-result-hivnat').text(data.hivnat);
                        $('.search-result-hcvnat').text(data.hcvnat);
                        $('.search-result-syphilis').text(data.syphilis);
                        $('.search-result-malaria').text(data.malaria);
                        $('.search-result-other').text(data.other);
                        $('.search-result-unit').text(data.unit);
                        $('.search-result-status').text(data.status);
                    } else {
                        $('#js-search-bloodbag-result').hide();
                        $('#js-search-bloodbag-no-result').show();
                    }

                }
            });
        } else {
            $('#search-user-info .search-user-info-code-error').show();
            $('#js-search-user-code input[name ="request_blood_id"]').val('');
        }
    })

    $('#fe-register').validate({
        rules: {
            email: {
                required: true,
                email: true,

            },
            password: {
                required: true,
                confirmed: true,
            },
            password_confirmation:{
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            email: {
                required: "Trường này phải có dữ liệu",
                email: "Email không hợp lệ",
                unique: "Email đã tồn tại"
            },
            password: {
                required: "Trường này phải có dữ liệu",
                confirmed: "Nhập lại mật khẩu không đúng",
            },
            password_confirmation:{
                required: "Trường này phải có dữ liệu",
                equalTo: "Nhập lại mật khẩu không đúng",
            },
        }
    });

    $('#js-register-donated').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            name: {
                required: true,
            },
            dob:{
                required: true,
            },
            cmnd:{
                required: true,
            },
            phone:{
                required: true,
            },
            cities:{
                required: true,
            },
            districts:{
                required: true,
            },
            communes:{
                required: true,
            },
            address:{
                required: true,
            },
        },
        messages: {
            email: {
                required: "Trường này phải có dữ liệu",
                email: "Email không hợp lệ",
            },
            name: {
                required: "Trường này phải có dữ liệu",
            },
            dob:{
                required: "Trường này phải có dữ liệu",
            },
            cmnd:{
                required: "Trường này phải có dữ liệu",
            },
            phone:{
                required: "Trường này phải có dữ liệu",
            },
            cities:{
                required: "Trường này phải có dữ liệu",
            },
            districts:{
                required: "Trường này phải có dữ liệu",
            },
            communes:{
                required: "Trường này phải có dữ liệu",
            },
            address:{
                required: "Trường này phải có dữ liệu",
            },
        }
    });

    $('#addUser').validate({
        rules: {
            email: {
                required: true,
                email: true,

            },
            password: {
                required: true,
            },
            role: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Trường này phải có dữ liệu",
                email: "Email không hợp lệ",
            },
            password: {
                required: "Trường này phải có dữ liệu",
                confirmed: "Nhập lại mật khẩu không đúng",
            },
            role: {
                required: "Trường này phải có dữ liệu",
            }
        }
    });

    $('#edit-user').validate({
        rules: {
            role: {
                required: true,
            }
        },
        messages: {
            role: {
                required: "Trường này phải có dữ liệu",
            }
        }
    });

    $('.form-blood').validate({
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Trường này phải có dữ liệu",
            }
        }
    });

    $('#js-change-admin-password-btn').click(function () {
        $('#js-change-admin-password-form').slideToggle('slow');
    });

    $('#js-add-calendar-form button[type = "submit"]').click(function (e) {
        e.preventDefault();
        var time = $('#js-add-calendar-form input[name = "time"]').val();
        var date = $('#js-add-calendar-form input[name = "date"]').val();
        var dateTime = new Date(time.concat(' ' + date)).toLocaleString();
        var currentdate = new Date().toLocaleString();
        if (dateTime < currentdate) {
            alert('Thời gian phải lớn hơn thời gian hiện tại');
        } else {
            $('#js-add-calendar-form').submit();
        }
    });

    $('#js-register-received-form #js-add-calendar-form-submit').click(function (e) {
        e.preventDefault();
        var dob = $('#js-register-received-form input[name = "dob"]').val();
        var dateTime = new Date(dob).getFullYear();
        var currentdate = new Date().getFullYear();
        if (dateTime > currentdate) {
            alert('Thời gian phải trước thời gian hiện tại');
        } else {
            $('#js-register-received-form').submit();
        }
    });

    $("#js-register-donated select[name='cities']").on('change', function() {
        var city_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "/register-donate/showDistrictInCity",
            method: 'GET',
            data: {
                city_id: city_id,
                _token: token,
            },
            success: function(data) {
                $("select[name='districts']").html('');
                $.each(data, function(key, value) {
                    $("select[name='districts']").append(
                        "<option value=" + key + ">" + value +
                        "</option>"
                        );
                });
            }
        });
    });

    $("select[name='districts']").change(function() {
        var district_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "/register-donate/showCommuneInDistrict",
            method: 'GET',
            data: {
                district_id: district_id,
                _token: token,
            },
            success: function(data) {
                $("select[name='communes'").html('');
                $.each(data, function(key, value) {
                    console.log(key);
                    $("select[name='communes']").append(
                        "<option value=" + key + ">" + value +
                        "</option>"
                        );
                });
            }
        });
    });
});
