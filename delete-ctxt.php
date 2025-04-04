<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $tb_id = $_POST['tb_id'];
    $where = "cid={$did} AND tb_id ={$tb_id}";
if($obj->delete($course_textbook,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $cid = $_POST['cids'];
    $tb_id = implode(',',$id);
    

    $where ="tb_id IN ({$tb_id}) AND cid={$cid}";
    if($obj->delete($course_textbook,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }


?>

