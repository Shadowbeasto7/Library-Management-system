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
            <h2 class="pageheader-title">Add Program</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Programs</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Programs</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row">
           <?php include "suc_message.php"; ?>
           <?php include "warn-message.php"; ?>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <a href="display_program.php" class="btn btn-outline-primary" >
                    DISPLAY PROGRAMS
                </a>
            </div>
        </div>
    </div>
</div>
   <div class="row">

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="container-fluid bg-white">
         <h5 class="card-header">ADD PROGRAM</h5>

            <div class="card-body">
               <form action="insert_program.php" method="POST">
                  <div class="form-group">
                     <label for="program"><strong>Program Name</strong></label>
                     <input  type="text" name="program" data-parsley-trigger="change" required placeholder="Enter program name" autocomplete="off" class="form-control">
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
   
</div>

<?php
   include('footer.php');
?>
