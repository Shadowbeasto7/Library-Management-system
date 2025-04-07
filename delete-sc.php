<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $cid = $_POST['cid'];
    $where = "sub_id={$did} AND cid ={$cid}";
if($obj->delete($subject_course,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $sub_id = $_POST['sub_id'];
    $cid = implode(',',$id);
    

    $where ="cid IN ({$cid}) AND sub_id={$sub_id}";
    if($obj->delete($subject_course,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }


?>

