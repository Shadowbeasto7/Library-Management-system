


<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'pub_id='.$did;
if($obj->delete($publication_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $pub_id = implode(',',$id);
    
    $where ="pub_id IN ({$pub_id})";
    if($obj->delete($publication_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

?>

