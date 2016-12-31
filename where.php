<?php

$string = "cancel";



try {
    //database connection
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    $sql = "select * from user.courier WHERE courier_id = :id";

    $data = $db->prepare($sql);
    $data->execute(array(":id" => $_GET["id"]));
    //////////////////////////fetching data/////////////////////////

        $info = $data->fetch();
    




    echo json_encode(array("cid" => $info["courier_id"],  "weight" => $info["weight"], "wirehouse1"=>$info["wirehouse1"] ,"wirehouse2"=>$info["wirehouse2"] ));



} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}