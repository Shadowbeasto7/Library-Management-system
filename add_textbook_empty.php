<?php
include "database.php";
include "tables.php";
include "header.php";
include "sidebar.php";
$obj = new database();
?>
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
            <h2 class="pageheader-title">Entry TextBook</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Textbook</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Entry Textbook</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <?php include "suc_message.php"; ?>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
               <a href="display_textbook_purchase.php" class="btn btn-outline-primary">
                  DISPLAY TEXTBOOKS PURCHASES
               </a>
            </div>
         </div>
      </div>
   </div>

   <div class="row">

      <!-- ============================================================== -->
      <!-- validation form -->
      <!-- ============================================================== -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card">
            <h5 class="card-header">ADD TEXTBOOK ENTRY</h5>
            <div class="card-body">
               <form action="insert_textbook_entry.php" method="POST">
                  <div class="row">
                     <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 mt-2">
                        <label for=""><strong>Textbook name</strong> </label>
                        <input type="text" class="form-control" name="textbook_name" autocomplete="off" placeholder="TextBook" required>

                     </div> -->
                     <!-- <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12  mb-2 mt-2">
                        <label for="subject"> <strong>Choose Subject:</strong></label>
                        <select name="subject_id" class="form-control form-control-sm" required>
                           <option value="">Select Subject</option>
                           <?php
                        //    $obj->select($subject_table, '*');
                        //    $result = $obj->getResults();
                        //    foreach ($result as $programs) {
                        //       echo " <option value='{$programs['sub_id']}'>{$programs['sub_name']}</option>";
                        //    }
                           ?>
                        </select>
                     </div> -->
                     <!-- <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12  mb-2 mt-2">
                        <label for="subject"><strong>Choose Author Of TextBook:</strong></label> -->
                        <!-- <select name="author_id" class="form-control form-control-sm" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)" required> -->
                        <!-- <select name="author_id[]" class="form-control form-control-sm" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)" required> -->
                           <!-- <option value="">Select Author </option> -->
                           <?php
                        //    $obj->select($author_table, '*');
                        //    $result = $obj->getResults();
                        //    foreach ($result as $programs) {
                        //       echo " <option value='{$programs['aid']}' class='border mt-1 p-2 text-primary'>{$programs['author_name']}</option>";
                        //    }
                           ?>
                        </select>
                 
                     <div class=" col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mb-2 mt-2">
                           <label for="subject"><strong>Choose   TextBook:</strong></label>
                           <select name="tb_id[]" class="form-control form-control-sm" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)" required>
                                    <!-- <option value="">Select Author </option> -->
                                    <?php
                                    $obj->select($textbook_table,'*');
                                    $result = $obj->getResults();
                                    foreach ($result as $txt) {
                                    ?>

                                        <option value="<?= $txt['tb_id'] ?>"><?= $txt['textbook'] ?> </option>

                                    <?php
                                    }
                                    ?>

                                </select>
                     </div>

                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 mt-2 ">
                        <label for=""><strong>Enter Date of purchase:</strong></label>
                        <input type="date" class="form-control" name="date" placeholder="purchase date"  required>

                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 mt-2">
                        <label for=""><strong>Enter Quantity Of TextBook Purchased:<small>(Quantity refert to No. of copies of the textbook)</small></strong>
                           <!-- <p></p> -->
                        </label>
                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>

                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <input class="btn btn-primary btn-sm" type="submit" value="Submit form"></input>
                        <input class="btn btn-space btn-secondary btn-sm mt-1" type="reset" value="Reset"></input>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- end validation form -->
      <!-- ============================================================== -->
   </div>

</div>


<!-- <form id="add-form">
<label for="Book-name">Enter Text-book Name:</label>
<input type="text" id="textbook_name">
<br>
<br>
<label for="subject">Choose subject related to book:</label>
<select  id="subject">
<option value="">Select subject</option>
</select>
<br>
<br>
<label for="author">Select the author of book:</label>
<select  id="author">
<option value="">Select author</option>
</select>
<br>
<br>
<label for="publication">Choose Publication of the  book:</label>
<select  id="publication">
<option value="">Select publication</option>
</select>
<br>
<br>

<label for="Quantity">Enter the price of the book:</label>
<input type="number" id="price">
<br>
<br>

<label for="Quantity">Enter the Quantity of the book:</label>
<input type="number" id="quantity">

<input type="submit" id="save-textbook" value="save">
</form>
<div id="success-msg"></div>
<div id="error-msg"></div> -->
<?php
include('footer.php');
?>