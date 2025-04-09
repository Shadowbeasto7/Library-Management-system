<?php
include "database.php";
include "tables.php";
$obj = new database();

if (isset($_POST['did'])) {

    $did = $_POST['did'];
    $where = 'tb_id=' . $did;
    $obj->select($books_table, '*', null, $where);
    $result = $obj->getResults();
    $status = false;
    foreach ($result as $books) {
        if ($books['status'] == 0) {
            $status = true;
        }
    }
    if ($status == true) {

        echo 0;
    } else {
        if ($obj->delete($textbook_table, $where)) {
            echo 1;
        } else {
            echo 0;
        }
    }
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    $tb_id = implode(',', $id);

    $where = "tb_id IN ({$tb_id})";

    $obj->select($books_table, '*', null, $where);
    $result = $obj->getResults();
    $status = false;
    foreach ($result as $books) {
        if ($books['status'] == 0) {
            $status = true;
        }
    }
    if ($status == true) {
        return null;
    } else {
        if ($obj->delete($textbook_table, $where)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

?>

