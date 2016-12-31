/**
 * Created by saiful on 12/31/16.
 */
$(function () {
    $("#wirehouse_confirmation").on("click",function () {


        
        var id = $("#courier_id").val();
        var w_true = $("#wirehouse :selected").val();
        var wirehouse = $("#wirehouse :selected").text();


        $.get("wirehouse.php",{id:id ,w_true:w_true ,w_name:wirehouse},function (data) {
            alert(data.ok);
        },"json");
    })



});