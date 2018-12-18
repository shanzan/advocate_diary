<?php
@ob_start();
session_start();
include_once('dashboardheader.php');
include_once('config/CaseOperations.php');
$db=new CaseOperations();
if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
header ("Location:index.php");
}

if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
    $userid=$_SESSION['id'];
}else{
    $userid=$_SESSION['usertypeid'];
}
        $getcase=array();
        try{
            $getcase=$db->getAllCaseData($userid);
        }catch (PDOException $e){

        }

?>
<!-- start reg log part -->
		
<div class="container">
	<br><br><br>
	<center><p class="log-in">ALL CASE</p></center>
 <div class="container">
    <div class="row">
        <form method="post" action="">
        <?php
        foreach ($getcase as $case) {
           echo '<div class="col-md-4 case-block">
             <h3 style="color: #e67e22;">Case Number:'.$case->case_number.'</h3>
             <p>Name:'.$case->complainant_name.'</p>
             <p>Next Date: '.$case->next_date.'</p>
             <input type="button" class="btn btn-default read_more" name="read_more" id='.$case->case_id.' value="READ MORE">
    	</div>';
        }
        ?>
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

<div id="datamodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <input type="button" class="close" data-dismiss="modal" value="X">
                <h4 class="modal-title">CASE DETAILS</h4>
            </div>
            <div class="modal-body" id="case_details">

            </div>
            <div class="modal-footer">
            </div>
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


<script>
    $(document).ready(function () {
        $('.read_more').click(function () {
            var case_id=$(this).attr("id");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    $('#case_details').html(xmlhttp.responseText);
                    $('#datamodal').modal("show");
                    $('#delete').val(case_id);
                }
            };
            xmlhttp.open("GET", "casedetails.php?nid="+case_id, true);
            xmlhttp.send();
        });
    });
</script>
<?php

include_once ("footer.php");
?>
