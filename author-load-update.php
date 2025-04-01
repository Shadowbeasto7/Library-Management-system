<?php
include 'database.php';
$obj = new database();
include 'tables.php';

$aid = $_POST['aid'];
// $aid =2;


$where ='aid='.$aid;
$obj->select($author_table,'*',null,$where);
$author = $obj->getResults();


foreach($author as $details){

    
 $output="<div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
         <div class='container-fluid bg-white'>
            <div class='card-body'>
               <form action='update_author.php' method='POST'>
                  <div class='form-group'>
                     <label for='author'><strong>Author Name</strong></label>
                     <input type='hidden' name='aid' value='{$details['aid']}'>
                     <input  type='text' name='author_name' data-parsley-trigger='change' required value='{$details['author_name']}' autocomplete='off' class='form-control'>
                  </div>
                  <div class='row'>
                     <div class='col-sm-6 pl-0'>
                        <p class='ml-3'>
                           <input type='submit' class='btn btn-space btn-primary btn-sm ' value='Update'></input>
                           <button class='btn btn-space btn-secondary btn-sm' type='reset'>Reset</button>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>";
}
echo $output;
?>