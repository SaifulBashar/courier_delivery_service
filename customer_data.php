<?php
$nid=$_GET["cnid"];


try {
    //database connection
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    $sql = "select * from user.customer where nid=:nid";
    $data = $db->prepare($sql);
    $data->execute(array(":nid" => $nid));
    //////////////////////////fetching data/////////////////////////
    $usr = $data->fetch();

    


    echo json_encode(array("name" =>$usr["customer_name"],"id"=>$usr["customer_id"],"phone"=>$usr["customer_phone"]
    ,"e"=>$e));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}