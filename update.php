<?php

$string = "cancel";


try {
    //database connection 
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    $sql = "select * from user.shipment where courier_id =:id";
    $data = $db->prepare($sql);
    $data->execute(array(":id" =>$_GET["courier_id"]));
    //////////////////////////fetching data/////////////////////////
    $id = $data->fetch();

    if($data->rowCount()>0){
        $string = $id["courier_id"];
    }
    
    echo json_encode(array("ok" =>$string));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}