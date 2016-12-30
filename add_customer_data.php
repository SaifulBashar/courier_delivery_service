<?php
$nid=$_GET["cnid"];
$name=$_GET["cname"];
$phone = $_GET["cphone"];
$confirmation="ok";


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
    if($data->rowCount()>0){
        echo json_encode(array("ok"=>$confirmation));
    }
    elseif ($data->rowCount()==0){
        $sql = "insert into user.customer
                           ( customer_name,
                            customer_phone,
                            nid)
                            VALUES (?,?,?)";
        $data= $db->prepare($sql);
        $data->execute(array($name,$phone,$nid));
        echo json_encode(array("ok"=>$confirmation));
    }






} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}