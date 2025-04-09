
<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'sub_id='.$did;
if($obj->delete($subject_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $sub_id = implode(',',$id);
    
    $where ="sub_id IN ({$sub_id})";
    if($obj->delete($subject_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

?>

