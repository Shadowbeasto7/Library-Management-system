<?php
include 'database.php';
$obj = new database();
include 'tables.php';

$cid = $_POST['aid'];

$where = 'cid=' . $cid;
$obj->select($course_table, '*', null, $where);
$program = $obj->getResults();


foreach ($program as $details) {
?>


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container-fluid bg-white">
    

                <div class="card-body">
                    <form action="update_course.php" method="POST">
                        <div class="row">
                        <input type='hidden' name='cid' value='<?=$cid?>'>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2  ">
                                <label for=""><strong>Enter Course Code:</strong></label>
                                <input type="text" class="form-control" name="code[]" value="<?=$details['course_code']?>" pattern='[A-Za-z0-9 ]+' placeholder="Course Code" min=1 required>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 ">
                                <label for=""><strong>Enter Course Name:</strong>
                                </label>
                                <input type="text" class="form-control" name="courses[]" value="<?=$details['course_name']?>" pattern='[A-Za-z0-9 ]+' placeholder="Course Name" required>

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
<?php

}
