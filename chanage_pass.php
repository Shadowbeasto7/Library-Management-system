<?php

include "database.php";
include "tables.php";
include "head.php";

// include "sidebar.php";
$obj = new database();
if($_SESSION['login']!=true){
    header("location:login_i.php");
}
else{








?>
<style>
    .dashboard-content {
        padding: 0px 30px 60px 30px;
    }
</style>







<div class="container-fluid mt-4">

    <div class="row ">
        <div class="col-12 ">
            <?php include("warn-message.php");
            include("suc_message.php"); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="page-header">
                <h2 class="pageheader-title text-center">Change Password</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">

        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-5 col-lg-5 ">
            <div class="card">
                <h5 class="card-header">Change Password : <?= $_SESSION['username'] ?></h5>

                <div class="card-body">
                    <form action="CHG_PSS.PHP" method="POST">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 ">
                                <label for=""><strong>Password</strong></label>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="enter password" required>
                                <div class="row mt-2">
                                    <div style="margin-left: 14px;">
                                        Show password
                                    </div>
                                    <div style="margin-top: 3px;margin-left:2px;">
                                        <input type='checkbox' id='check'>

                                    </div>
                                </div>
                            </div>
                            <!-- <small>Password and confirm password must be same</small> -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2">
                                <label for=""><strong>Confirm Password</strong></label>
                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="enter confirm password">
                                <input type="hidden" class="form-control" name="uid"  value="<?=$_GET['uid']; ?>">
                                <!-- <div class="row mt-2">
                                    <div style="margin-left: 14px;">
                                        Show password
                                    </div>
                                    <div style="margin-top: 3px;margin-left:2px;">
                                        <input type='checkbox' id='ccheck'>
                                        
                                    </div>
                                </div> -->
                                <div class="mt-2" id='info'></div>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2">
                        <a href="change_pass.php">Forget Password?</a>

                     </div> -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <input class="btn btn-success btn-sm" type="submit" id='log' value="Change"></input>
                                <!-- <input class="btn btn-space btn-secondary btn-sm mt-1" type="reset" value="Reset"></input> -->
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
<?php
}

?>

<!-- <script src="N/js/jquery.min.js"></script> -->
<script src="assets/js/jquery.js"></script>
<script src="N/js/popper.js"></script>
<script src="N/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#check').click(function() {
            //  alert($(this).is(':checked'));
            $(this).is(':checked') ? $('#pass').attr('type', 'text') : $('#pass').attr('type', 'password');
        });
        $('#ccheck').click(function() {
            //  alert($(this).is(':checked'));
            $(this).is(':checked') ? $('#cpass').attr('type', 'text') : $('#cpass').attr('type', 'password');
        });



         var bools= false;
         $('input[type="submit"]').attr('disabled','disabled');

        $('#pass').on('change', function() {
            
            var pass = this.value;
            console.log(pass)
            $("#cpass").on('input', function(key) {
                // console.log(key);
                var val = this.value;
                console.log(val)
                if(pass!=val){
                    $("#info").html("<small class='mt-2 text-danger'>Password and confirm password donot match</small>") 
                }else{
                    $("#info").html("<small class='mt-2 text-success'>Passwords Matched</small>") 
                    var bools=true;
                    $('input[type="submit"]').removeAttr('disabled');

                }

            });
        })

    });
</script>

<!-- <script src="assets/js/own.js"></script> -->