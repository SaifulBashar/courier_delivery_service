<?php

$string = "cancel";



try {
    //database connection
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    if($_GET["w_name"] == "wirehouse1"){
        $sql = "UPDATE user.courier SET wirehouse1 = :w_true WHERE courier_id = :id;";
    }
    if($_GET["w_name"] == "wirehouse2"){
        $sql = "UPDATE user.courier SET wirehouse2 = :w_true WHERE courier_id = :id;";
    }

    $data = $db->prepare($sql);
    $data->execute(array(":id" => $_GET["id"]  , ":w_true" => $_GET["w_true"]));
    //////////////////////////fetching data/////////////////////////






    echo json_encode(array("ok" => "update"));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}