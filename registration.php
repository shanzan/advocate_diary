<?php
include_once('header.php');
include_once('config/DBoperations.php');
$db=new DBOperations();

if (isset($_POST["register"])){
    $username=$_POST["rusername"];
    $useremail=$_POST["remail"];
    $userphone=$_POST["rnumber"];
    $user_pass=$_POST["rpassword"];
    $confirm_pass=$_POST["rconfirmpassword"];
    $user_type="0";
    $user_update= date("Y-m-d");
    $date_created= date("Y-m-d");

    if ($user_pass==$confirm_pass){
        $result=$db->createUser($username, $useremail, $userphone,$user_pass,$user_type,$user_update,$date_created);
        if($result==1){
            $message = "User Registered Successfully";
            echo "<script>alert('$message');window.location.href='login.php';</script>";
        }else if ($result==2){
            $message = "Some error occurred please try again";
            echo "<script>alert('$message');</script>";
        }else if($result==0){
            $message= "Your email or phone number already exists please use another email or phone";
            echo "<script>alert('$message');</script>";
        }else{
            $message= "There is an Unknown error";
            echo "<script>alert('$message');</script>";
        }
    }else{
        $message= "Password Did not match";
        echo "<script>alert('$message');</script>";
    }
}
?>

<!-- start reg log part -->
		
<div class="container">
	<br><br>
	<center><p class="log-in">REGISTER HERE</p></center>

    <div class="row">
    	<div class="col-md-6 col-md-offset-3 log-form">
            	<form action="" method="post">
    				<div class="form-group">
    					<label class="user">Username:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
    						<input required type="text" name="rusername" class="form-control" placeholder="Enter Username">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="user">E-mail:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-envelope"></i>
    						</span>
    						<input required type="email" name="remail" class="form-control" placeholder="Enter your email">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="user">Contact number</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-phone"></i>
    						</span>
    						<input required type="number" name="rnumber" class="form-control" placeholder="Enter phone number">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="user">Password:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-key"></i>
    						</span>
    						<input required type="password" name="rpassword" class="form-control" placeholder="Enter Password">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="user">Confirm Password:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-key"></i>
    						</span>
    						<input required type="password" name="rconfirmpassword" class="form-control" placeholder="Re-enter Password">
    					</div>
    				</div>

    				<div class="form-group regbutton">
    					<input type="submit" class="btn btn-default" name="register" value="REGISTER">
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