<?php
include "database.php";
include "tables.php";
include "header.php";
include "sidebar.php";

$obj = new database();
?>
<div id="success-msg"></div>
<div id="error-msg"></div>
<div class="container-fluid">
   <div class="row">

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
            <h2 class="pageheader-title">Add Batches</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Batch</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Batch</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
   <?php include "suc_message.php"; ?>
   <?php include "warn-message.php"; ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <a href="display_batch.php" class="btn btn-outline-primary" >
                    DISPLAY BATCHES
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">

   
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="container-fluid bg-white">
            <h5 class="card-header">ADD BATCH</h5>
            <div class="card-body">
               <form action="insert_batch.php" method="POST">
                  <div class="form-group">
                     <label for="author"><strong>Batch Name</strong></label>
                     <input id="author" type="text" name="batch_name" data-parsley-trigger="change" required="" placeholder="Enter batch name" autocomplete="off" class="form-control" required>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 pl-0">
                        <p class="ml-3">
                           <input type="submit" class="btn btn-space btn-primary btn-sm " value="Submit"></input>
                           <button class="btn btn-space btn-secondary btn-sm" type="reset">Reset</button>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- <form id="add-form">
                   <label for="author">Enter author Name:</label>
                   <input type="text" id="author">
                   <input type="submit" id="save-author" value="save">
                  </form> -->
</div>

<?php
include('footer.php');
?>