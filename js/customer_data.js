/**
 * Created by saiful on 12/29/16.
 */
$(function () {

    $("#customer_name").on("click",function () {
        var nid = $("#nid").val();
        if($("#customer_name").val() ==""){
            $.get( "customer_data.php",{cnid:nid}, function( data ) {
                
                $("#customer_name").val(data.name);
                $("#phone").val(data.phone);
                $("#id").val(data.id);
                
            }, "json" );
        }
        else
        {

        }

    });
    
    $("#go").on("click",function () {
        var nid = $("#nid").val();
        var name = $("#customer_name").val();
        var phone = $("#phone").val();
        $.get( "add_customer_data.php",{cnid:nid,cname:name,cphone:phone}, function( data ) {
            if (data.ok == "ok"){
                location.replace("shipment.html");
            }
            

        }, "json" );
    });

    $("#r_go").on("click",function () {
        var nid = $("#nid").val();
        var name = $("#customer_name").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var r_phone = $("#r_phone").val();
        var office_id = $("#office_id :selected").val();
        var weight = $("#weight").val();
        var st = nid+name+phone+address+r_phone+office_id+weight;
        //alert(st);
        $.get("shippment.php",{
            address:address,
            r_phone:r_phone,
            office_id:office_id,
            cnid:nid,
            cname:name,
            cphone:phone,
            weight:weight
        },function (data) {
            alert();
        },"json");
    })
});


