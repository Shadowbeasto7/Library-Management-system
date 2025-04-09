<?php
include "database.php";
include "tables.php";
$obj = new database();

if (isset($_POST['did'])) {

    $did = $_POST['did'];
    $tb_id = $_POST['tb_id'];
    $where = 'tb_id=' . $tb_id;
    $where_p = 'tb_pid=' . $did;
    $obj->select($books_table, '*', null, $where);
    $result = $obj->getResults();
    $obj->select($entry, '*', null, $where_p);
    $result_p = $obj->getResults();
    $limit = $result_p[0]['quantity'];
    $status = false;
    foreach ($result as $books) {
        if ($books['status'] == 0) {
            $status = true;
        }
    }
    if ($status == true) {

        echo 0;
    } else {
        if ($obj->delete($entry, $where_p)) {
            if ($obj->delete($books_table, $where, $limit)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }
} elseif (isset($_POST['id'])) {
    // echo "hello";
    $id = $_POST['id'];
    $tid = $_POST['tb_id'];
    $tb_id = implode(',', $tid);
    // // $tb_pid = implode(',', $id);

    $where = "tb_id IN ({$tb_id})";
    // // $where_p = "tb_pid IN ({$tb_pid})";

    $obj->select($books_table, '*', null, $where);
    $result = $obj->getResults();
    $status = false;
    foreach ($result as $books) {
        if ($books['status'] == 0) {
            $status = true;
        }
    }
    // // echo"<br>". $status;
    if ($status == true) {
        return null;
    } else {
        //     if ($obj->delete($entry, $where_p)) {
        //         echo 1;
        //     } else {
        //         echo 0;
        //     }
        // }
        $check = false;
        $quant = array();
        foreach ($id as $tb_pid) {
            $where = "tb_pid = {$tb_pid}";
            $obj->select($entry, '*', null, $where);
            $result = $obj->getResults();
            foreach ($result as $qunt) {
                $quant[] = $qunt['quantity'];
            }
            if ($obj->delete($entry, $where)) {
                $check = true;
            }
        }
        if ($check == true) {
            $count = 0;
            $data = false;
            $limit = 0;
            foreach ($tid as $tb_id) {
                $where = "tb_id ={$tb_id}";
                // echo $where;
                $qu = count($quant);
                $qu;

                $limit = $quant[$count];

                if ($obj->delete($books_table, $where, $limit)) {
                    $data = true;
                    $count++;
                }
            }
        }
    }
    if ($data == true) {
        echo 1;
    } else {
        echo 0;
    }
}

// }
// $boo
//     }
// }
