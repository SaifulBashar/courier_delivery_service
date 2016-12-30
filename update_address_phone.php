<?php

$string = "cancel";


try {
    //database connection
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    $sql = "update user.shipment set address = :address , phone = :phone where courier_id = :id";
    $data = $db->prepare($sql);
    $data->execute(array(":id" =>$_GET["uid"],":address"=>$_GET["uaddress"],":phone"=>$_GET["uphone"]));
    //////////////////////////fetching data/////////////////////////

    //$data->execute(array(":id" =>1   ,   ":address"=>"abc"   ,  ":phone"=>455256));
    $id = $data->fetch();
    if ($data->rowCount()){
        $string="sucess";
    }



    echo json_encode(array("ok" =>$string));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}