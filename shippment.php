<?php
$address = $_GET["address"];
$r_phone = $_GET["r_phone"];
$office_id = $_GET["office_id"];
$c_nid = $_GET["cnid"];
$weight = $_GET["weight"];
$string = "cancel";

//$address = "abc";
//$r_phone = "789";
//$office_id = 1122;
//$c_nid = 12345789;
//$weight = 10;
//$string = "cancel";


try {
    //database connection
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
//    ////////////////////////////==============================///////////////////////////////////
//
//
//    /////////////////////////////sql////////////////////////////
    //SELECT nid FROM user.customerWHERE nid = $c_nid
    $data = $db->prepare("SELECT * FROM user.customer WHERE nid = :nid");
    $data->execute(array(":nid"=>$c_nid));
    //////////////////////////fetching data/////////////////////////
    $customer = $data->fetch();
    $sql = "insert into user.shipment(customer_id,
                                      office_id,
                                      address,
                                      phone)
                                      VALUES (?,?,?,?)";
    $data = $db->prepare($sql);
    $data->execute(array($customer["customer_id"],$office_id,$address,$r_phone));
    //////////////////////////fetching data/////////////////////////





    ////////////////////update courier information ////////////////////////

    $sql = "select max(courier_id) from user.shipment";
    $data = $db->prepare($sql);
    $data->execute();
    $id = $data->fetch();


    $data = $db->prepare("insert into user.courier (courier_id,weight)VALUES (?,?)");
    $data->execute(array($id[0],$weight));


    echo json_encode(array("ok" => $id[0]));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}