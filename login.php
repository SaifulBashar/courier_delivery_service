<?php
/**
 * Created by PhpStorm.
 * User: saiful
 * Date: 11/17/16
 * Time: 7:04 PM
 */
$name =$_GET["name"];
$pass = $_GET["pass"];
$string = "cancel";


try{
    $db = new PDO('mysql:host=localhost;dbname=user','root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    $value=$db->query("s")->fetch(PDO::FETCH_ASSOC);
    $sql = "select * from user.user_validation where username =:name";
    $data = $db->prepare($sql);
    $data->execute(array(":name"=>$name));
    $usr=$data->fetch();
//    echo '<pre>';
//    print_r($usr["username"]);
//    echo '<pre>';
    if ($name == $usr["username"] && $pass == $usr["password"]) {
        $string = "confirm";
    }
    else{
        $string="cancel";
    }

    echo json_encode(array("ok"=>$string));

}
catch (PDOException $e){
    echo "error ".$e->getMessage();
}