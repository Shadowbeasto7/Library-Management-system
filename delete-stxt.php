<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $tb_id = $_POST['tb_id'];
    $where = "sub_id={$did} AND tb_id ={$tb_id}";
if($obj->delete($subject_textbook,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $sub_id = $_POST['sub_id'];
    $tb_id = implode(',',$id);
    

    $where ="tb_id IN ({$tb_id}) AND sub_id={$sub_id}";
    if($obj->delete($subject_textbook,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }


?>

