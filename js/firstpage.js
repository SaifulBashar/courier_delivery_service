/**
 * Created by saiful on 11/17/16.
 */
$(function () {
    function a(data) {
        $("[name=uname]").val("");
        $("#p").val("");
        if (data.ok == "confirm") {
            alert("success");
            $("[name=uname]").val('');
            $("#p").val('');
        }
        else {
            alert("fail");
        }
    }
    $("#p").on('click keypress',function (e) {
        if(!$("[name=uname]").val()){
            $("[name=uname]").css({
                "border": "3px solid red",

                "background-color": "transparent"
            });
        }
        if($("[name=uname]").val()){
            $("[name=uname]").css({
                "border": "0px solid #000000",
                "border-bottom-width": "3px",
                "background-color": "transparent"
            });
        }
       


    })

    $("[name=login]").on("click keypress",function (e) {
        if (e.which === 13 || e.type === 'click') {


            if (!$("[name=uname]").val() && !$("#p").val()) {
                $("[name=uname]").css({
                    "border": "3px solid red",

                    "background-color": "transparent"
                });
                $("#p").css({
                    "border": "3px solid red",

                    "background-color": "transparent"
                });
            }
            else if (!$("[name=uname]").val() || !$("#p").val()) {
                if (!$("[name=uname]").val()) {
                    $("[name=uname]").css({
                        "border": "3px solid red",

                        "background-color": "transparent"
                    });
                }
                else if (!$("#p").val()) {
                    $("#p").css({
                        "border": "3px solid red",

                        "background-color": "transparent"
                    });
                }
            }

            else {
                var form_data_name = $("[name=uname]").val();
                var form_data_pass = $("#p").val();
                $.get("login.php", {name: form_data_name, pass: form_data_pass}, function (data) {
                    $("[name=uname]").val("");
                    $("#p").val("");
                    if (data.ok == "confirm") {
                        alert("success");
                        $("[name=uname]").val('');
                        $("#p").val('');
                    }
                    else {
                        alert("fail");
                    }
                }, "json");


            }
        }

    });

});