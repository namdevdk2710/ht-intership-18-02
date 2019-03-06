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
});
