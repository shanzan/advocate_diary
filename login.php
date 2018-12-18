<?php
include_once('header.php');
include_once('config/DBoperations.php');
session_start();

$db=new DBOperations();
if (isset($_POST["submit"])){
   $username=$_POST["username"];
   $usepassword=$_POST["password"];


    if (!empty($_POST["remember_me"])){
        setcookie("member_name",$_POST["username"],time()+(10*365*24*60*60));
        setcookie("member_password",$_POST["password"],time()+(10*365*24*60*60));
    }else{
        if(isset($_COOKIE["member_name"])){
            setcookie("member_name","");
        }
        if(isset($_COOKIE["member_password"])){
            setcookie("member_password","");
        }
    }

    if (!empty($_POST["subuser"])){
        if ($db->subUserLogin($username,$usepassword) ){
            $user=$db->getSubuserbyemail($username);
            $_SESSION['id']=$user['sub_user_id'];
            $_SESSION['name']=$user['sub_user_name'];
            $_SESSION['email']=$user['sub_user_email'];
            $_SESSION['number']=$user['sub_user_phone'];
            $_SESSION['usertypeid']=$user['user_id'];

            $message = "SUB USER Login successful";
            echo "<script>alert('$message');window.location.href='dashboard.php';</script>";
        }else{
            $message = "Invalid User Email Or Password";
            echo "<script>alert('$message');</script>";
        }
    }else{
        if ($db->userLogin($username,$usepassword) ){
            $user=$db->getUserbyemail($username);
            $_SESSION['id']=$user['user_id'];
            $_SESSION['name']=$user['user_name'];
            $_SESSION['email']=$user['user_email'];
            $_SESSION['number']=$user['user_phone'];

            $message = "USER Login successful";
            echo "<script>alert('$message');window.location.href='dashboard.php';</script>";
        }else{
            $message = "Invalid User Email Or Password";
            echo "<script>alert('$message');</script>";
        }
    }


}

?>
<div class="container" xmlns="http://www.w3.org/1999/html">
	<br><br><br>
	<center><p class="log-in">LOGIN HERE</p></center>

    <div class="row">
    	<div class="col-md-6 col-md-offset-3 log-form">
            	<form method="post" action="" >
    				<div class="form-group">
    					<label class="user">Username:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
    						<input type="email" name="username" class="form-control" placeholder="Enter Username" value="<?php
                            if(isset($_COOKIE["member_name"])){
                                echo $_COOKIE["member_name"];
                            }
                            ?>">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="user">Password:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-key"></i>
    						</span>
    						<input type="password" name="password" class="form-control" placeholder="Enter Password"value="<?php
                            if(isset($_COOKIE["member_password"])){
                                echo $_COOKIE["member_password"];
                            }
                            ?>">
    					</div>
    				</div>

    				<div class="form-group">
                        <input type="checkbox" name="remember_me" value="Remember Me" <?php
                        if(isset($_COOKIE["member_name"])){
                            ?>checked<?php
                        }
                        ?>>Remember Me</br>
                        <input type="checkbox" name="subuser" value="subuser"> Subuser<br>
    					<input type="submit" class="btn btn-default" name="submit" value="LOGIN">
    				</div>
    				<br><br><br>
    				<a href="forgetpass.php" style="color: #ffffff; font-size: 15px; float: right;">Forget Password?</a>

    			</form>
    	</div>
    </div>

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


</div>
<!-- Back to top -->



	




	

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

<?php
include_once ("footer.php");
?>
