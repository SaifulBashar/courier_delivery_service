<?php
$name = $_GET["name"];
$pass = $_GET["pass"];
$string = "cancel";


try {
    //database connection 
    $db = new PDO('mysql:host=localhost;dbname=user', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //database connection
    ////////////////////////////==============================///////////////////////////////////


    /////////////////////////////sql////////////////////////////
    $sql = "select * from user.user_validation where username =:name";
    $data = $db->prepare($sql);
    $data->execute(array(":name" => $name));
    //////////////////////////fetching data/////////////////////////
    $usr = $data->fetch();

    if ($name == $usr["username"] && $pass == $usr["password"]) {
        
        $string = "login";

    } else {

        $string = "cancel";

    }


    
    echo json_encode(array("ok" => $string,"type"=> $usr["user_privilage"]));


} catch (PDOException $e) {
    echo "error " . $e->getMessage();
}