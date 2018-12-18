<?php
@ob_start();
session_start();
include_once('dashboardheader.php');
include_once('config/DBoperations.php');

if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}
if (isset($_POST["submit"])){

    $useremail=$_SESSION['email'];
    $db=new DBOperations();
    $oldpass=$_POST["oldpassword"];
    $pass=$_POST["newpassword"];
    $confirmpass=$_POST["confirmpass"];

    if ($pass==$confirmpass){
        if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
            if ($db->userLogin($useremail,$oldpass)){
                //update user by  call functions
                $db->userPasswordChange($pass,$useremail);
                $message="Password Successfully Changed ,Please Login !!!";
                echo "<script>alert('$message');window.location.href='login.php';</script>";
                session_unset();
            }else{
                $message = "Password did not Match";
                echo "<script>alert('$message');</script>";
            }
        }else{
            if ($db->subUserLogin($useremail,$oldpass)){
                //update user by  call functions
                $db->subuserPasswordChange($pass,$useremail);
                $message="Password Successfully Changed ,Please Login !!!";
                echo "<script>alert('$message');window.location.href='login.php';</script>";
                session_unset();
            }else{
                $message = "Password did not Match";
                echo "<script>alert('$message');</script>";
            }
        }
    }else{
        $message = "New Password Did Not Matched";
        echo "<script>alert('$message');</script>";
    }
}

?>

<div class="container">
    <br><br><br>
    <center><p class="log-in">WELCOME</p></center>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 log-form">
                <p class="log-in">User Name :  <?php echo $_SESSION['name'];?><br>
                User Email : <?php echo $_SESSION['email'];?><br>User Phone No : <?php echo $_SESSION['number'];?></p>
            <br>
            <center><p class="log-in">CHANGE PASSWORD</p></center>

            <form method="post" action="">
                <div class="form-group">
                    <label class="user">Enter Old Password</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="password" name="oldpassword" class="form-control" placeholder="Enter New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="user">Enter New Password</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="user">Confirm New Password</label>
                    <div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
                        <input required type="password" name="confirmpass" class="form-control" placeholder="Confirm New Password">
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
include_once('footer.php');
?>
