/**
 * Created by saiful on 11/17/16.
 */
$(function () {
    $("[name=pass]").on('click',function () {
        if(!$("[name=uname]").val()){
            $("[name=uname]").css({
                "border": "3px solid red",

                "background-color": "transparent"
            });
        }
        else{
            $("[name=uname]").css({
                "border": "0px solid #000000",
                "border-bottom-width": "3px",
                "background-color": "transparent"
            });
        }
    })
});