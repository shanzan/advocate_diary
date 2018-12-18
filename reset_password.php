<?php
@ob_start();
session_start();

include_once('header.php');
include_once('config/DBoperations.php');

if (!(isset($_SESSION['r_email']) && $_SESSION['r_email'] != '')) {
    header("Location:index.php");
}

if (isset($_POST["submit"])){

    $useremail=$_SESSION['r_email'];
    $db=new DBOperations();
    $pass=$_POST["r_password"];
    $confirmpass=$_POST["r_confirmpassword"];

    if ($pass==$confirmpass){
        if ($_SESSION['reset']=="0"){
            $db->userPasswordChange($pass,$useremail);
        }else{
            $db->subuserPasswordChange($pass,$useremail);
        }
        $message="Password Changed ,Please Login !!!";
        echo "<script>alert('$message');window.location.href='login.php';</script>";
        session_unset();
    }else{
        $message = "Password did not Match";
        echo "<script>alert('$message');</script>";
    }
}
?>
<!-- start reg log part -->

<div class="container">
    <br><br><br>
    <center><p class="log-in">RESET YOUR PASSWORD</p></center>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 log-form">
            <form method="post" action="">
                <div class="form-group">
                    <label class="user">Enter New Password</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="password" name="r_password" class="form-control" placeholder="Enter New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="user">Confirm Password</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="password" name="r_confirmpassword" class="form-control" placeholder="Confirm New Password">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-default" name="submit" value="SUBMIT">
                </div>
            </form>
        </div>
    </div>


</div>









<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- /Preloader -->

<!-- jQuery Plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>

<?php
include_once ("footer.php");
?>

