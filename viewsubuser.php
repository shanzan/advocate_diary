<?php
@ob_start();
session_start();
include_once('dashboardheader.php');
include_once('config/DBoperations.php');

if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}
$db=new DBOperations();
$userid=$_SESSION['id'];

if (isset($_POST['deletesub'])){
    $subid=$_POST['deletesub'];
    $result=$db->DeletesubUser($subid);
    if($result==1){
        $message = "Sub User Delated";
        echo "<script>alert('$message');window.location.href='viewsubuser.php';</script>";
    }else {
        $message = "Some error occurred please try again";
        echo "<script>alert('$message');</script>";
    }
}
?>
<!-- start reg log part -->

<div class="container">
    <br><br><br>
    <center><p class="log-in">ALL SUB USERS</p></center>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table cellpadding="10" style="text-align: center" class="table-bordered" width="100%" >
                    <tr>
                        <th style="text-align: center"><strong>SUB USER NAME</strong></th>
                        <th style="text-align: center"><strong>Sub User Email</strong></th>
                        <th style="text-align: center"><strong>Sub User Phone Number</strong></th>
                        <th style="text-align: center"><strong>ACTION</strong></th>
                    </tr>
                        <?php
                        $usubuser=$db->getAllSubUsers($userid);
                        foreach ($usubuser as $subuser){
                        echo '<tr>
                        <td>'.$subuser->sub_user_name.'</td>
                        <td>'.$subuser->sub_user_email.'</td>
                        <td>'.$subuser->sub_user_phone.'</td>
                        <td>
                        <form action="" method="post">
                        <button type="submit" name="deletesub" class="btn btn-danger" value="'.$subuser->sub_user_id.'">DELETE</button>
                        </form>
                        </td>
                    </tr>';
                    }
                    ?>
                </table>
            </div>
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

<?php
include_once("footer.php");
?>
?>