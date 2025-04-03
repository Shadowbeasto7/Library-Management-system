<?php
include "database.php";
include "tables.php";
$obj=new database();

$did = $_POST['did'];
$where = 'sts_act_id='.$did;
if($obj->delete($sts_acts,$where)){
    echo 1;
}
else{
    echo 0;
}
?>