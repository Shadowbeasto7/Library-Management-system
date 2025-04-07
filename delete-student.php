<?php
include "database.php";
include "tables.php";
$obj=new database();

if(isset($_POST['did'])){

    $did = $_POST['did'];
    $where = 'sid='.$did;
if($obj->delete($student_table,$where)){
    echo 1;
}
else{
    echo 0;
}
}elseif(isset($_POST['id'])){
    $id = $_POST['id'];
    $sid = implode(',',$id);
    
   if(count($id)==1){
    $where ='sid ='.$sid;

    if($obj->delete($student_table,$where)){

        echo true;
    }
    else{
        echo false;
    }
   }else{
    $where ="sid IN ({$sid})";
    if($obj->delete($student_table,$where)){
        echo true;
    }
    else{
        echo false;
    }
   }

}
?>

