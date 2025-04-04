<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $pid = $_POST['pid'];
    $where = "cid={$did} AND pid ={$pid}";
if($obj->delete($course_program,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $pid = $_POST['pid'];
    $cid = implode(',',$id);
    

    $where ="cid IN ({$cid}) AND pid={$pid}";
    if($obj->delete($course_program,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }


?>

