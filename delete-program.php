

<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'pid='.$did;
if($obj->delete($program_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $pid = implode(',',$id);
    
    $where ="pid IN ({$pid})";
    if($obj->delete($program_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

?>

