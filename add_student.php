<?php
include "database.php";
include "tables.php";
include "header.php";
include "sidebar.php";

$obj = new database();
?>
<style>
   .dashboard-content {
      padding: 0px 30px 60px 30px;
   }
</style>
<div class="row mt-4 ">
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="page-header">
         <h2 class="pageheader-title">Add Student</h2>
         <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Student</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Student</li>
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
            <a href="display_student.php" class="btn btn-outline-primary">
               DISPLAY STUDENTS
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
         <div class="card-body">
            <form id='add-form' action="insert_student.php" method="POST">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 ">
                     <label for=""><strong>First name</strong></label>
                     <input type="text" class="form-control" name="fname" placeholder="First name" required>

                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2">
                     <label for=""><strong>Middle name</strong></label>
                     <input type="text" class="form-control" name="mname" placeholder="Middle name">

                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 ">
                     <label for=""><strong>Last name</strong></label>
                     <input type="text" class="form-control" name="lname" placeholder="Last name" required>

                  </div>


                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12  mb-2">
                     <label for=""><strong>Date Of Birth</strong></label>
                     <input type="date" class="form-control" name="dob" required>

                  </div>

                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12  mb-2">
                     <label for="Program"><strong>Choose Program</strong></label>
                     <select name="program_id" class="form-control form-control-sm" required>
                        <option value="">Select program</option>
                        <?php
                        $obj->select($program_table, '*');
                        $result = $obj->getResults();
                        foreach ($result as $programs) {
                           echo " <option value='{$programs['pid']}'>{$programs['program']}</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                     <label for=""><strong>Choose Batch</strong></label>
                     <select name="batch" class="form-control form-control-sm" required>
                        <option value="">Select Batch</option>
                        <?php
                        $obj->select($batch_table, '*');
                        $result = $obj->getResults();
                        foreach ($result as $batches) {
                           echo " <option value='{$batches['batch_id']}'>{$batches['batch_name']}</option>";
                        }
                        ?>
                     </select>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                     <label for=""><strong>Enter Level (In semenster)</strong></label>
                     <input type="number" class="form-control" name="level" placeholder="Level (number only)" max="8" min="1" required>

                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                     <label for=""><strong>Enter Registration Number</strong></label>
                     <input type="text" class="form-control" name="reg_no" placeholder="Registration Number" required>
                     
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                     <label for=""><strong>Enter Phone Number</strong></label>
                     <input type="number" class="form-control" name="phone" placeholder="phone Number" required minlength="10" maxlength="10">
                     
                  </div>
                  <div class=" col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                     <label for="gen" class=" mb-2"><strong>Gender:</strong></label>
                     <div class="" data-toggle="buttons" required>

                        <label class="btn btn-outline-primary btn-xs btn-space" style="height: 25px;border-radius:50%;">
                           <input type="radio" name="gender" id="option2" autocomplete="off" value="Male" required> Male
                        </label>
                        <label class="btn btn-outline-primary btn-xs btn-space" style="height: 25px;border-radius:50%;">
                           <input type="radio" name="gender" id="option3" autocomplete="off" value="Female" required> Female
                        </label>
                     </div>

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





<!-- 
<form id="add-form">
   <label for="Program">Enter First Name:</label>
   <input type="text" id="fname">
   <br>
   <br>
   <label for="Program">Enter Middle Name:</label>
   <input type="text" id="mname">
   <br>
   <br>

   <label for="Program">Enter Last Name:</label>
   <input type="text" id="lname">
   <br>
   <br>
   <label for="Program">Choose Program:</label>
   <select id="program" class="form-control form-control-sm">
      <option value="">Select program</option>

   </select>
   <br>
   <br>

   <label for="Program">Enter Date of birth:</label>
   <input type="date" id="dob">
   <br>
   <br>

   <label for="Program">Enter reg-no:</label>
   <input type="number" id="reg-no">
   <br>
   <br>

   <label for="Program">Enter Batch Name:</label>
   <input type="text" id="batch">
   <br>
   <br>

   <label for="Program">Enter level :(in semenster)</label>
   <input type="number" id="level">
   <br>
   <br>

   <input type="submit" id="save-student" value="save">
</form> -->
<div id="success-msg"></div>
<div id="error-msg"></div>
<?php
include('footer.php');
?>