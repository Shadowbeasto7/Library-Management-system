<?php
include 'database.php';
$obj = new database();
include 'tables.php';

$ib_id = $_POST['ib_id'];

$where ='ib_id='.$ib_id;
$join = "JOIN $books_table ON $issued_book_table.bid=$books_table.bid  JOIN $textbook_table ON $books_table.tb_id=$textbook_table.tb_id";
$obj->select($issued_book_table,'*',$join,$where);
$issued = $obj->getResults();

foreach($issued as $details){
    
 $output="<div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
         <div class='container-fluid bg-white'>
            <div class='card-body'>
               <form action='return_book.php' method='POST'>
                  <div class='form-group'>
                     <label for='program'><strong>Book Name</strong></label>
                     <input type='hidden' name='bid' value='{$details['bid']}'>
                     <input type='hidden' name='sid' value='{$details['sid']}'>
                     <input type='hidden' name='date' value='{$details['date']}'>
                     <input type='hidden' name='ib_id' value='{$details['ib_id']}'>
                     <input type='hidden' name='price' value='{$details['price']}'>
                     <input type='hidden' name='dmg' value='1'>
                     <input  type='text' name='textbook' data-parsley-trigger='change' required value='{$details['textbook']}' autocomplete='off' class='form-control' readonly>
                  </div>
                  <div class='form-group'>
                     <label for='program'><strong>Total Amount To Pay<small>(as fine in Nrs.)</small></strong></label>
                     <input  type='number' name='fine' data-parsley-trigger='change'  value='{$details['price']}' required autocomplete='off' class='form-control' readonly >
                     <label for='program' class='mt-2'><strong>Paying Amount</strong></label>
                     <input  type='number' name='fine' data-parsley-trigger='change' min=0 max='{$details['price']}' required autocomplete='off' class='form-control' >
                  </div>
                  <div class='row'>
                     <div class='col-sm-12 pl-0'>
                        <p class='ml-3'>
                           <input type='submit' class='btn btn-space btn-primary btn-sm' value='Pay and Return Book'></input>
                           <button class='btn btn-space btn-secondary btn-sm'  data-dismiss='modal'>Cancel</button>
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