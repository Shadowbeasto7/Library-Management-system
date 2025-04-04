<?php
// include "database.php";
// include "tables.php";
// $obj=new database();

// $batch_id = $_POST['batch_id'];
// $where = 'batch_id='.$batch_id;
// if($obj->delete($batch_table,$where)){
//     echo 1;
// }
// else{
//     echo 0;
// }
?>



<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['batch_id'])){

    $did = $_POST['batch_id'];
    $where = 'batch_id='.$did;
if($obj->delete($batch_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $batch_id = implode(',',$id);
    
    $where ="batch_id IN ({$batch_id})";
    if($obj->delete($batch_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

?>

