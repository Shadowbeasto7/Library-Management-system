<?php
include "database.php";
include "tables.php";
include "header.php";
include "sidebar.php";
$obj = new database();
?>
<style>
   #books-list {
      padding: 0;
   }

   #books-list li {
      list-style: none;
      padding: 3px;
      background-color: #ffe8e8;
      border: 1px solid black;
      cursor: pointer;
      font-size: 15px;
   }

   #suggestion-box {
      overflow: auto;
      height: auto;
      max-height: 200px;
      /* border: 2px solid black; */
      z-index: 99;
      position: relative;

   }
   #suggesstion-boxe {
      overflow: auto;
      height: auto;
      max-height: 200px;
      /* border: 2px solid black; */
      z-index: 99;
      position: relative;

   }
</style>
<div id="success-msg"></div>
<div id="error-msg"></div>
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
            <h2 class="pageheader-title">Add Publicatoin</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Publication</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Publlication</li>
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
                <a href="display_publication.php" class="btn btn-outline-primary" >
                    DISPLAY PUBLICATION
                </a>
            </div>
        </div>
    </div>
</div>
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="container-fluid bg-white">
         <h5 class="card-header">ADD PUBLICATION</h5>

            <div class="card-body">
               <form action="insert_publication.php" method="POST">
                  <div class="form-group">
                     <label for="publication"><strong>Publication Name</strong></label>
                     <input type="text" id="pub" name="publication" data-parsley-trigger="change" required="" placeholder="Enter publication name" autocomplete="off" class="form-control">
                     <div id="suggestion-box"></div>
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
<!-- <form id="add-form">
<label for="publication">Enter Publication Name:</label>
<input type="text" id="publication">
<input type="submit" id="save-publication" value="save">
</form>
<div id="success-msg"></div>
<div id="error-msg"></div> -->
<?php
   include('footer.php');
?>
