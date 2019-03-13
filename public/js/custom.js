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

    $("#myInput").on("keyup", function()  {
        var value = $(this).val().toLowerCase();
        $(".body-user tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $(".myInput").on("keyup", function()  {
        var value = $(this).val().toLowerCase();
        $("#body-calendar tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $(".myInput").on("keyup", function()  {
        var value = $(this).val().toLowerCase();
        $("#body-donated tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $(".myInput").on("keyup", function()  {
        var value = $(this).val().toLowerCase();
        $("#body-received tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
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
});
