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

    .sel {
        padding: 5px;
        height: 30px;
        /* width: 60px; */
    }

    table,
    td {
        border: none;
    }
</style>


<div id="success-msg"></div>
<div id="error-msg"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Add Subject</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Subject</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Subject</li>
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

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-flex">
                    <a href="display_course.php" class="btn btn-outline-primary">
                        DISPLAY COURSE
                    </a>
                    <a href="#" class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#bulk">

                        Add Courses In Bulk
                    </a>
                </div>
                <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
               <a href="display_subject.php" class="btn btn-outline-primary">
                  DISPLAY SUBJECT
               </a>
            </div> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container-fluid bg-white">
                <h5 class="card-header">ADD COURSE</h5>

                <div class="card-body">
                    <form action="insert_course.php" method="POST">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2  ">
                                <label for=""><strong>Enter Course Code:</strong></label>
                                <input type="text" class="form-control" name="code[]" pattern='[A-Za-z0-9 ]+' placeholder="Course Code" min=1 required>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 ">
                                <label for=""><strong>Enter Course Name:</strong>
                                </label>
                                <input type="text" class="form-control" name="courses[]"  placeholder="Course Name" required>

                            </div>

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
<div class="">
    <!-- Button trigger modal --->
    <!-- Modal -->
    <div class="modal fade" id="bulk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Courses</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <fieldset style="margin-left:3%;margin-right:3%;font-family:sans-serif;padding:15px;border-radius:5px;background:#f2f2f2;border:5px solid #1F497D">

                            <form action="insert_course.php" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="textbox">
                                            <tr>
                                                <td>

                                                    <input type="button" onclick="addFunction()" class="btn btn-primary btn-xs mb-2" value="Add More Columns" />
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <input type='text' style='width: 160px;' class="form-control" placeholder='enter course code' name='code[]'  required>
                                                        </div>
                                                        <div class="col-5 ml-1">
                                                            <input type='text' style='width: 160px;' class="form-control" name='courses[]' placeholder='enter course name'   required>
                                                        </div>


                                                    </div>
                                                    <!-- <input type="textbox"> -->
                                                </td>
                                            </tr>
                                        </table>
                                        <button type="submit" class="btn btn-primary btn-xs mt-2">Submit</button>
                                    </div>
                                </div>



                            </form>
                        </fieldset>
                        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
                        <script>
                            // var btn =document.getElementById('sub');
                            // btn.style.display=none;
                            function addFunction() {
                                var table = document.getElementById("textbox");
                                var rowlen = table.rows.length;
                                var row = table.insertRow(rowlen);
                                row.id = rowlen;
                                // var arr = ['textboxfiledname'];
                                for (i = 0; i < 2; i++) {
                                    var x = row.insertCell(i)
                                    if (i == 1) {
                                        x.innerHTML = "<input type='button' class='btn btn-danger btn-xs ' onclick='removeCell(" + row.id + ")'  value=Delete Column>"
                                    } else {
                                        x.innerHTML = "<div class='row mt-1'><div class='col-5'><input type='text' style='width: 160px;' class='form-control' name='code[]'  placeholder='enter course code'></div><div class='col-5'> <input type='text' style='width: 160px;' class='form-control ml-1'  name='courses[]'  placeholder='enter course name' ></div></div>"
                                    }
                                }
                            }

                            function removeCell(rowid) {
                                var table = document.getElementById(rowid).remove();
                            }
                        </script>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary " data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <form id="add-form">
<label for="subject">Enter Subject Name:</label>
<input type="text" id="subject">
<input type="submit" id="save-subject" value="save">
</form>
<div id="success-msg"></div>
<div id="error-msg"></div> -->
    <?php
    include "footer.php";
    ?>