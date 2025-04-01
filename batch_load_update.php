<?php
include 'database.php';
$obj = new database();
include 'tables.php';

$batch_id = $_POST['batch_id'];

$where ='batch_id='.$batch_id;
$obj->select($batch_table,'*',null,$where);
$program = $obj->getResults();

// print_r($program); 

foreach($program as $details){
 
    
 $output="<div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
         <div class='container-fluid bg-white'>
            <div class='card-body'>
               <form action='update_batch.php' method='POST'>
                  <div class='form-group'>
                     <label for='program'><strong>Batch Name</strong></label>
                     <input type='hidden' name='batch_id' value='{$details['batch_id']}'>
                     <input  type='text' name='batch' data-parsley-trigger='change' required value='{$details['batch_name']}' autocomplete='off' class='form-control'>
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
// include("footer.php");
?>