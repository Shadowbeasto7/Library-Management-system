<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'cid='.$did;
if($obj->delete($course_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $cid = implode(',',$id);
    
   if(count($id)==1){
    $where ='cid ='.$cid;

    print_r($id);
    if($obj->delete($course_table,$where)){

        echo true;
    }
    else{
        echo false;
    }
   }else{
    $where ="cid IN ({$cid})";
    if($obj->delete($course_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

}
?>

