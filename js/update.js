/**
 * Created by saiful on 12/30/16.
 */
$(function () {

    $("#u_go").on("click",function () {
        var id = $("#cid").val();

        $.get("update.php",{courier_id:id},function (data) {
            if(data.ok == id){
                $("#details").css({
                    "display": "block"
                });
            }
        },"json");
    })



    $("#update_button").on("click",function () {
        var address = $("#update_address").val();
        var phone = $("#update_phone").val();
        var id = $("#cid").val();
        
        alert(address+phone+id);
        $.get("update_address_phone.php",
            {
                uid:id,
                uaddress:address,
                uphone:phone
            }, function (data) {
            alert(data.ok);
        },"json");
    })
});