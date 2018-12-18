<?php
@ob_start();
session_start();
include_once('dashboardheader.php');
if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}
if (isset($_POST["addsub_user"])){
    if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
        header("Location:addsubuser.php");
    }else{
        echo "<script>alert('YOU ARE NOT AUTHORIZED FOR THIS SECTION');</script>";
    }
}
if (isset($_POST["view_case"])){
        header("Location:allcase.php");
}
if (isset($_POST["addnewcase"])){
    header("Location:addcase.php");
}
if (isset($_POST["viewsubuser"])){
    if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
        header("Location:viewsubuser.php");
    }else{
        echo "<script>alert('YOU ARE NOT AUTHORIZED FOR THIS SECTION');</script>";
    }
}
if (isset($_POST["showcalender"])){
    header("Location:showcasedate.php");
}
?>
<div class="container">
	<br><br><br>
	<center><p class="log-in">YOUR DASHBOARD</p></center>

    <div class="row dashboard">
    	<div class="col-md-6 col-md-offset-3 log-form">
            	<form method="post" action="">
    				<div class="form-group">
    					<button class="btn btn-default" name="addnewcase">ADD YOUR CASE</button>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-default"  name="view_case" >VIEW CASES</button>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-default" name="addsub_user" >ADD SUB USER</button>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-default" name="viewsubuser">VIEW SUB USERS</button>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-default" name="showcalender">MY CASE CALENDER</button>
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