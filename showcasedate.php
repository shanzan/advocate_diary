<?php
@ob_start();
session_start();
include_once('dashboardheader.php');

if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}

include_once('config\CaseOperations.php');
$db=new CaseOperations();

if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
    $userid=$_SESSION['id'];
}else{
    $userid=$_SESSION['usertypeid'];
}
try{
    $getdates=$db->getAllCaseData($userid);
}catch (PDOException $e){

}
?>

<div class="container">
    <br><br><br>
    <center><p class="log-in">CASE DATES</p></center>

    <div class="container">
        <div class="row">
                <?php
                foreach ($getdates as $dates) {
//                    $date = new DateTime($dates["next_date"]);
//                    $result = $date->format('Y-m-d');

                    $date=explode("-", $dates->next_date);

                    $month="";
                    switch ($date[1]){
                        case 1:
                            $month="JANUARY";
                            break;
                        case 2:
                            $month="FEBRUARY";
                            break;
                        case 3:
                            $month="MARCH";
                            break;
                        case 4:
                            $month="APRIL";
                            break;
                        case 5:
                            $month="MAY";
                            break;
                        case 6:
                            $month="JUNE";
                            break;
                        case 7:
                            $month="JULY";
                            break;
                        case 8:
                            $month="AGUST";
                            break;
                        case 9:
                            $month="SEPTEMBAR";
                            break;
                        case 10:
                            $month="OCTOBER";
                            break;
                        case 11:
                            $month="NOVEMBER";
                            break;
                        case 12:
                            $month="DECEMBER";
                            break;
                        default:
                            $month="NONE";
                                break;
                    }

                    echo '<div style="border-width: 5px; background-color: #d0e9c6" class="col-md-3 case-block">
             <h2 style="color: #e67e22;">'.$month.'</h2>
             <h1>'.$date[2].'</h1>
             <h2 style="color: #e67e22;">'.$date[0].'</h2>
    	</div>';
                }
                ?>
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