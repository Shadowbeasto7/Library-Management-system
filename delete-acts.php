
<?php

include "database.php";
include "tables.php";
$obj = new database();

if (isset($_POST['did'])) {

    $did = $_POST['did'];
    $where = "sts_act_id ={$did} AND fine_status NOT IN(0,3)";
    $obj->select($sts_acts, '*', null, $where);
    $res = $obj->getResults();
    if ($res == null) {
        $where = 'sts_act_id=' . $did;
        if ($obj->delete($sts_acts, $where)) {
            echo 'true';
        } else {
            echo 'false';
        }
    } else {
        echo 'false';
    }
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sts_act_id = implode(',', $id);
    $where = "sts_act_id IN ({$sts_act_id}) AND fine_status NOT IN(0,3)";
    $obj->select($sts_acts, '*', null, $where);
    $res = $obj->getResults();
    // print_r($res);
    if ($res == null) {
        $where = "sts_act_id IN ({$sts_act_id})";
        if ($obj->delete($sts_acts, $where)) {
            echo 'true';
        } else {
            echo 'false';
        }
    } else {
        echo 'false';
    }
}

?>

