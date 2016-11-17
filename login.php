<?php
/**
 * Created by PhpStorm.
 * User: saiful
 * Date: 11/17/16
 * Time: 7:04 PM
 */
print_r(PDO::getAvailableDrivers());
ini_set('display_errors','On');
try{
    $db = new PDO('mysql:host=localhost;dbname=user','root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $value=$db->query("select * from user.user_validation where username = 'saiful'")->fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($value);
    echo '<pre>';

}
catch (PDOException $e){
    echo "error ".$e->getMessage();
}