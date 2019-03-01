$(document).ready(function () {
    $("select[name='city']").change(function() {
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
});
