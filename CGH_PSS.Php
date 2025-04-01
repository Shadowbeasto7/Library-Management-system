<?php
include("database.php");
include("tables.php");
$obj = new database();

$pass = $_POST['cpass'];
$uid = $_POST['uid'];


$up_param =['pass'=>$pass];
$where = "uid = {$uid}";
if($obj->update($user_table,$up_param,$where)){
    $_SESSION['message']="!! Password Change Successfull !! Login Again";
    // include("logout.php");
    // session_unset($_SESSION['login']);
    header("location:login_i.php");

}
















?>