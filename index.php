<?php
include "database.php";
include "tables.php";
$obj = new database();
include "header.php";
include "sidebar.php";

$select = 'COUNT(*)';
$obj->select($issued_book_table,$select,null,'status=0');
$res_iss=$obj->getResults();
$iss_new=$res_iss[0]['COUNT(*)'];
$obj->select($author_table, $select);
$result_at = $obj->getResults();
$authors = $result_at[0]['COUNT(*)'];
$obj->select($textbook_table, $select);
$result_tb = $obj->getResults();
$textbooks = $result_tb[0]['COUNT(*)'];
$obj->select($student_table, $select);
$result_st = $obj->getResults();
$students = $result_st[0]['COUNT(*)'];
$obj->select($issued_book_table, $select);
$result_ib = $obj->getResults();
$issues = $result_ib[0]['COUNT(*)'];
$obj->select($program_table, $select);
$result_p = $obj->getResults();
$programs = $result_p[0]['COUNT(*)'];
$obj->select($publication_table, $select);
$result_p = $obj->getResults();
$publications = $result_p[0]['COUNT(*)'];
$obj->select($batch_table, $select);
$result_p = $obj->getResults();
$batches = $result_p[0]['COUNT(*)'];
$obj->select($subject_table, $select);
$result_p = $obj->getResults();
$subjects = $result_p[0]['COUNT(*)'];
$obj->select($returned_book_table, $select);
$result_p = $obj->getResults();
$returns = $result_p[0]['COUNT(*)'];
$obj->select($course_table, $select);
$result_p = $obj->getResults();
$courses = $result_p[0]['COUNT(*)'];


?>
<style>
    .back-widget-set {
        width: 200px;
    }

    #main {
        height: auto;
    }
    .blinking-div {
  display: inline-block;
  height: auto;
  padding: 5px; /* Adjust the padding as needed */
   /* Create a round shape */
  /* background-color: red; */
  animation: blink 1s ease-in-out infinite;
}

@keyframes blink {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }

}

</style>

<div class="row">
<?php include("suc_message.php") ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Admin Dashboard</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <?php if($iss_new>0){ ?>
                        <div class="blinking-div"><a href="issue_request_all.php" class="badge badge-danger"><?=$iss_new?> New Issue Request</a></div>
                        <?php } ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-white" id='main'>
    <div class="row pad-botm">
        <div class="col-md-12">


        </div>

    </div>

    <div class="row mt-3 justify-content-center">
        <a href="display_textbook.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-success back-widget-set text-center">
                    <i class="fa fa-book fa-5x"></i>
                    <h3><?= $textbooks ?></h3>

                    TextBooks Listed
                </div>
            </div>
        </a>



        <a href="issued_details_all.php">
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 col-xl-3">
                <div class="alert alert-warning back-widget-set text-center">
                    <i class="fa fa-recycle fa-5x"></i>

                    <h3><?= $issues ?></h3>

                    Books Not Returned Yet
                </div>
            </div>
        </a>

        <a href="display_student.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-danger back-widget-set text-center">
                    <i class="fa fa-users fa-5x"></i>
                    <h3><?= $students ?></h3>

                    Students
                </div>
            </div>
        </a>


        <a href="display_author.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-primary back-widget-set text-center">
                    <i class="fa fa-user fa-5x"></i>
                    <h3><?= $authors ?></h3>
                    Authors Listed
                </div>
            </div>
        </a>

        <a href="display_program.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-info back-widget-set text-center">
                    <i class="fas fa-file-archive fa-5x"></i>

                    <h3><?php echo ($programs == null) ? 0 : $programs ?></h3>

                    Listed Programs
                </div>
            </div>
        </a>
        <a href="return_details_all.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-info back-widget-set text-center">
                    <i class="fas fa-exchange-alt fa-5x"></i>

                    <h3><?php echo ($returns == null) ? 0 : $returns ?></h3>

                   Books Returned
                </div>
            </div>
        </a>
        <a href="display_subject.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-primary back-widget-set text-center">
                    <i class="fas fa-window-restore fa-5x"></i>

                    <h3><?php echo ($subjects == null) ? 0 : $subjects ?></h3>

                    Listed Subjects
                </div>
            </div>
        </a>
        <a href="display_batch.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-danger back-widget-set text-center">
                    <i class="fas fa-bookmark fa-5x"></i>

                    <h3><?php echo ($batches == null) ? 0 : $batches ?></h3>

                    Listed Batches
                </div>
            </div>
        </a>
        <a href="display_course.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-warning back-widget-set text-center">
                    <i class="fab fa-palfed fa-5x"></i>

                    <h3><?php echo ($courses == null) ? 0 : $courses ?></h3>

                    Listed Courses
                </div>
            </div>
        </a>
        <a href="display_publication.php">
            <div class="col-md-3 col-sm-3 col-xs-2 col-lg-3 col-xl-3">
                <div class="alert alert-success back-widget-set text-center">
                    <i class="fab fa-palfed fa-5x"></i>

                    <h3><?php echo ($publications == null) ? 0 : $publications ?></h3>

                    Listed Publications
                </div>
            </div>
        </a>
        </a>
       
    </div>

</div>
<?php
include "footer.php";

?>