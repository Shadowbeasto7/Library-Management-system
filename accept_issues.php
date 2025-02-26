<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['ib_id'])){

    $did = $_POST['ib_id'];
    $where = 'ib_id='.$did;
    $par=['status'=>1];
if($obj->update($issued_book_table,$par,$where)){
    echo 1;
}
}

?>