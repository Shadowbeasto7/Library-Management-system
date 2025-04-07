
<?php

include "database.php";
include "tables.php";
$obj = new database();

if (isset($_POST['did'])) {

    $did = $_POST['did'];
    // $did = 21;
    $where = "rb_id ={$did} AND fine_status NOT IN(0,3)";
    $obj->select($returned_book_table, '*', null, $where);
    $res = $obj->getResults();
    // print_r($res)
    if ($res == null) {
        $where = 'rb_id=' . $did;
        if ($obj->delete($returned_book_table, $where)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }else{

        echo 'false';

    }

} 
else {
    $id = $_POST['id'];
    // $id = [7];
    $rb_id = implode(',', $id);

    $where = "rb_id IN ({$rb_id}) AND fine_status NOT IN(0,3)";
    $obj->select($returned_book_table, '*', null, $where);
    $res = $obj->getResults();
    // print_r($res);
    if ($res == null) {
        $where = "rb_id IN ({$rb_id})";

        if ($obj->delete($returned_book_table, $where)) {
            echo 'true';
        } else {
            echo 'false';
        }
    } else {
        echo 'false';
    }
}

?>

