<?php

include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'aid='.$did;
if($obj->delete($author_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $aid = implode(',',$id);
    
   if(count($id)==1){
    $where ='aid ='.$aid;

    print_r($id);
    if($obj->delete($author_table,$where)){

        echo true;
    }
    else{
        echo false;
    }
   }else{
    $where ="aid IN ({$aid})";
    if($obj->delete($author_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

}
?>

