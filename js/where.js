/**
 * Created by saiful on 12/31/16.
 */
$(function () {
    

    $("#w_go").on("click",function () {
        var cid = $("#serial").val();
        
        $.get(
            "where.php",
            {
                id: cid
            },
            function (data) {
                var conf = "\nid : "+data.cid+" weight : "+data.weight+"\n";
                var where = "";
                if(data.wirehouse1 == 1 && data.wirehouse2 == 1){
                    where = "\n in wirehouse1 and wirehouse 2 \n";
                }
                else if(data.wirehouse2 == 1){
                    where = "\n in wirehouse2 \n";
                }
                else if(data.wirehouse1 == 1){
                    where = "\n in wirehouse1 \n";
                }
                else {
                    where = "not in wirehouse";
                }
                conf += where;
                alert(conf);
            },
            "json"
        );
    })
})