<?php
@ob_start();
session_start();
include_once('header.php');
include_once('config/DBoperations.php');

require 'PHPMailer-master/PHPMailerAutoload.php';

if (isset($_POST["submit"])){

    $useremail=$_POST["u_email"];
    $db=new DBOperations();
    $code=rand(100000,999999);

    $mail = new PHPMailer();
    //Enable SMTP debugging.
    //$mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = TRUE;
    //Provide username and password
    $mail->Username = "shanzan420@gmail.com";
    $mail->Password = "Shn@1993";
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "false";
    $mail->Port = 587;
    //Set TCP port to connect to
    $mail->From = "noreply@gmail.com";
    $mail->FromName = "Advocates Diary";



if (!empty($_POST["subuser"])){
    if ($db->Forget_sub_userExixts($useremail)){
        $subuser=$db->getSubuserbyemail($useremail);
        $mail->addAddress($subuser['sub_user_email']);
        $mail->isHTML(false);
        $mail->Subject = "Securirty code for Forgot password";
        $mail->Body = "Dear ".$subuser['sub_user_name'].",<br> <p>We Received that you are requested to reset your account password </p><br> 
                    <h1 style='color: firebrick'>Varification code is : ".$code."</h1> <br> <strong>please enter This varification code to reset your password.</strong> 
                    <br>If you are not please log in to your account and change your password <br> Thank you <br> Advocates Diary";
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        else
        {
            $_SESSION['reset']=$subuser['user_id'];
            $_SESSION['r_email']=$subuser['sub_user_email'];
            $db->enterforgetpasssubuser($useremail,$code);
            $message = "A Varification code is send to your email, Please Reset your password with that code";
            echo "<script>alert('$message');window.location.href='varificationpage.php';</script>";
        }

    }else{
        $message = "Given email is not associted with any account";
        echo "<script>alert('$message');</script>";
    }
}else{
    if ($db->Forget_userExixts($useremail) ){
        $user=$db->getUserbyemail($useremail);
        $mail->addAddress($user['user_email']);
        $mail->isHTML(false);
        $mail->Subject = "Securirty code for Forgot password";
        $mail->Body = "Dear ".$user['user_name'].",<br> <p>We Received that you are requested to reset your account password </p><br> 
                    <h1 style='color: firebrick'>Varification code is : ".$code."</h1> <br> <strong>please enter This varification code to reset your password.</strong> 
                    <br>If you are not please log in to your account and change your password <br> Thank you <br> Advocates Diary";
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        else
        {
            $_SESSION['reset']=$user['user_type'];
            $_SESSION['r_email']=$user['user_email'];
            $db->enterforgetpass($useremail,$code);
            $message = "A Varification code is send to your email, Please Reset your password with that code";
            echo "<script>alert('$message');window.location.href='varificationpage.php';</script>";
        }
    }else{
        $message = "Given email is not associted with any account";
        echo "<script>alert('$message');</script>";
    }

}
}
?>
<!-- start reg log part -->
		
<div class="container">
	<br><br><br>
	<center><p class="log-in">FORGET YOUR PASSWORD</p></center>

    <div class="row">
    	<div class="col-md-6 col-md-offset-3 log-form">
            	<form method="post" action="">
    				<div class="form-group">
    					<label class="user">Enter your E-mail:</label>
    					<div class="input-group">
    						<span class="input-group-addon">
    							<i class="fa fa-user"></i>
    						</span>
    						<input required type="email" name="u_email" class="form-control" placeholder="Enter your e-mail">
    					</div>
                        <input type="checkbox" style="text-align: right" name="subuser" value="subuser"> Subuser<br>
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

