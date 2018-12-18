<?php
@ob_start();
session_start();
include_once('header.php');
include_once('config/DBoperations.php');
if (!(isset($_SESSION['r_email']) && $_SESSION['r_email'] != '')) {
    header("Location:index.php");
}

if (isset($_POST["submit"])){
    $email=$_SESSION['r_email'];
    $code=$_POST["r_code"];
    $db=new DBOperations();

    if ($_SESSION['reset']=="0"){
        $getcode=$db->getforgetcode($email);
        if ($getcode==$code){
            $message = "Code Matched";
            echo "<script>alert('$message');window.location.href='reset_password.php';</script>";
        }else{
            $message = "Please enter the correct varification code";
            echo "<script>alert('$message');</script>";
        }
    }else{
        $getcode=$db->getforgetcodesubuser($email);
        if ($getcode==$code){
            $message = "Code Matched";
            echo "<script>alert('$message');window.location.href='reset_password.php';</script>";
        }else{
            $message = "Please enter the correct varification code";
            echo "<script>alert('$message');</script>";
        }
    }



}
?>
<!-- start reg log part -->

<div class="container">
    <br><br><br>
    <center><p class="log-in">ENTER VARIFICATION CODE</p></center>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 log-form">
            <form method="post" action="">
                <div class="form-group">
                    <label class="user">Enter Your Varification Code</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="number" name="r_code" class="form-control" placeholder="Enter varication code">
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

