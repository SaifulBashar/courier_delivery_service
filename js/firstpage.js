/**
 * Created by saiful on 11/17/16.
 */
$(function () {
    function ajax(data) {
        //username making empty
        //password making empty
        $("[name=uname]").val("");
        $("#p").val("");
        //data come from php script as json
        if (data.ok == "confirm") {
            alert("success");
            //username making empty
            //password making empty
            $("[name=uname]").val('');
            $("#p").val('');
            filled_password_css();
            filled_username_css();
        }
        else {
            alert("fail");
        }
    }
    //indicate username field empty
    function empty_username_css() {
        $("[name=uname]").css({
            "border": "3px solid red",
            "background-color": "transparent"
        });
    }
    //indicate password field full
    function filled_username_css() {
        $("[name=uname]").css({
                "border": "0px solid #000000",
                "border-bottom-width": "3px",
                "background-color": "transparent"
            });
    }
    //indicate password field empty
    function empty_password_css() {
        $("#p").css({
            "border": "3px solid red",

            "background-color": "transparent"
        });
    }
    //indicate password field full
    function filled_password_css() {
        $("#p").css({
            "border": "0px solid #000000",
            "border-bottom-width": "3px",
            "background-color": "transparent"
        });
    }
    //check username before entering password
    $("#p").on('click keypress',function (e) {
        if(!$("[name=uname]").val()){

            empty_username_css();
        }
        if($("[name=uname]").val()){

            filled_username_css();
        }
        //add enter button event
        if(e.keyCode ===13){
            if(!$("#p").val() && !$("[name=uname]").val()){
                // $("[name=uname]").css({
                //     "border": "3px solid red",
                //
                //     "background-color": "transparent"
                // });
                // $("#p").css({
                //     "border": "3px solid red",
                //
                //     "background-color": "transparent"
                // });
                empty_password_css();
                empty_username_css()
            }
            else {
                var form_data_name = $("[name=uname]").val();
                var form_data_pass = $("#p").val();

                $.get("login.php", {name: form_data_name, pass: form_data_pass}, ajax, "json");

                filled_username_css();

                filled_password_css();
            }

        }

    })
    //login button action on click and enter button
    $("[name=login]").on("click keypress",function (e) {
        if (e.which === 13 || e.type === 'click') {


            if (!$("[name=uname]").val() && !$("#p").val()) {
                empty_password_css();
                empty_username_css();
            }
            else if (!$("[name=uname]").val() || !$("#p").val()) {
                if (!$("[name=uname]").val()) {
                    empty_username_css();
                }
                if (!$("#p").val()) {
                    empty_password_css();
                }
            }

            else {
                var form_data_name = $("[name=uname]").val();
                var form_data_pass = $("#p").val();
                //ajax
                $.get("login.php", {name: form_data_name, pass: form_data_pass}, ajax, "json");


            }
        }

    });

});