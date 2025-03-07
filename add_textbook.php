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
            <h2 class="pageheader-title">Add Textbook</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Textbook</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Textbook</li>
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
               <a href="display_textbook.php" class="btn btn-outline-primary">
                  DISPLAY TEXTBOOKS
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
            <h5 class="card-header">ADD TEXTBOOK</h5>
            <div class="card-body">
               <form action="insert_textbook.php" method="POST">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 mt-2">
                        <label for=""><strong>Textbook name</strong> </label>
                        <input type="text" class="form-control" name="textbook_name" autocomplete="off" placeholder="TextBook" required>

                     </div>
                     <!-- <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12  mb-2 mt-2">
                        <label for="subject"> <strong>Choose Subject:</strong></label>
                        <select name="subject_id" class="form-control form-control-sm" required>
                           <option value="">Select Subject</option>
                           <?php
                           $obj->select($subject_table, '*');
                           $result = $obj->getResults();
                           foreach ($result as $programs) {
                              echo " <option value='{$programs['sub_id']}'>{$programs['sub_name']}</option>";
                           }
                           ?>
                        </select>
                     </div> -->
                     <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12  mb-2 mt-2">
                        <label for="subject"><strong>Choose Author Of TextBook:</strong></label>
                        <!-- <select name="author_id" class="form-control form-control-sm" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)" required> -->
                        <select name="author_id[]" class="form-control form-control-sm" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)" required>
                           <!-- <option value="">Select Author </option> -->
                           <?php
                           $obj->select($author_table, '*');
                           $result = $obj->getResults();
                           foreach ($result as $programs) {
                              echo " <option value='{$programs['aid']}' class='border mt-1 p-2 text-primary'>{$programs['author_name']}</option>";
                           }
                           ?>
                        </select>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <a href="#" class="btn btn-outline-primary mt-4 btn-xs" data-toggle="modal" data-target="#Add-author">
                    ADD AUTHOR
                </a>
            </div>
                     <div class=" col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2 mt-2">
                           <label for="subject"><strong>Choose Publication Of TextBook:</strong></label>
                           <select name="publication_id" class="form-control form-control-sm" required>
                              <option value="">Select Publication </option>
                              <?php
                              $obj->select($publication_table, '*');
                              $result = $obj->getResults();
                              foreach ($result as $programs) {
                                 echo " <option value='{$programs['pub_id']}'>{$programs['publication']}</option>";
                              }
                              ?>
                           </select>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 mt-1 ">
                        <label for=""><strong>Enter Price Of TextBook:</strong></label>
                        <input type="number" class="form-control" name="price" placeholder="TextBook Price" min=1 required>

                     </div>
                     <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 ">
                        <label for=""><strong>Enter Quantity Of TextBook:</strong>
                           <p><small>(Quantity refert to No. of copies of the textbook)</small></p>
                        </label>
                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>

                     </div> -->
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
<div class="">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="Add-author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Authors</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="container-fluid bg-white">
                                    <div class="card-body">
                                        <form action="insert_author.php" method="POST">
                                            <div class="form-group">
                                                <label for="author"><strong>Author Name</strong></label>
                                                <input id="auth" type="text" name="author_name" data-parsley-trigger="change" required="" placeholder="Enter author name" autocomplete="off" class="form-control" required>
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
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
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