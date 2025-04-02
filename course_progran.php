<?php
include('database.php');
include('tables.php');
$obj = new database();
// include ('header.php');
// include('select_head.php');


$pid = $_POST['pid'];
$values = false;

$where = "pid = {$pid}";
$obj->select($course_program, '*', null, $where);
$result_s = $obj->getResults();
// print_r($result_s);
if ($result_s == null) {
    $obj->select($course_table, '*');
    $result = $obj->getResults();
} else {
    $ca = array();
    foreach ($result_s as $c_assigned) {
        $ca[] = $c_assigned['cid'];
    }
    // print_r($ca);
    $str_ca = implode(',', $ca);
    // echo $str_ca;
    $where = "cid NOT IN ({$str_ca})";
    $obj->select($course_table, '*', null, $where);
    $result = $obj->getResults();
    // print_r($result);
    if ($result == null) {
        $values = true;
    } else {
        $values = false;
    }
}

?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="container-fluid bg-white">


            <div class="card-body">
                <?php
                if ($values == true) {
                    echo "<p class='lead text-info'>All the courses available are assigned to this program</p>";
                } elseif ($values == false) {

                ?>
                    <form action="insert_course_program.php" method="POST">
                        <input type="hidden" name="program" value="<?= $pid ?>">


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bt  mb-2 mt-2">


                            <style>
                                .show ul {
                                    overflow: auto;
                                    max-height: 200px;
                                    /* width: 440px; */

                                }

                                .show ul li {
                                    margin-left: 5px;
                                    margin:5px ;
                                }

                                .bt.show {
                                    max-width: 200px;
                                }
                                .show ul{
                                    width: 400px;
                                }

                                /* .btn-default{
                              width: 440px;
                              
                           } */
                           .multiselect{
                            width: 400px;
                            margin-left:-10px ;
                           }
                           .btn-group>.btn:first-child{
                            width: -15px;
                           }
                            </style>

                            <label for="subject"><strong>Choose Courses Of TextBook:</strong></label>
                            <br>


                            <select id="multiple-checkboxes" name="courses_p[]" multiple="multiple">
                                <?php
                                foreach ($result as $courses) {
                                ?>

                                    <option value="<?= $courses['cid'] ?>"><?= $courses['course_name'] ?> </option>

                                <?php
                                }
                                ?>
                            </select>

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
                <?php

                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/js/multiselect-dropdown.js"></script> -->

<?php
include('foot.php');

?>
<!-- <script src="assets/bootstrap/js/bootstrap.bundle.js"></script> -->
<!-- <script src="assets/js/main-js.js"></script>
<script src="assets/js/jquery.js"></script> -->