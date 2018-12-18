<?php
@ob_start();
session_start();
include_once('dashboardheader.php');
include_once('config/CaseOperations.php');
if (!(isset($_SESSION['email']) && $_SESSION['email'] != '')) {
    header("Location:index.php");
}
if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
    $userid=$_SESSION['id'];
}else{
    $userid=$_SESSION['usertypeid'];
}
?>


<!-- start reg log part -->

<div class="container">
    <br><br><br>
    <center><p class="log-in">ADD YOUR CASE</p></center>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 log-form">
            <form action="" method="post">
                <div class="form-group">
                    <label>Case Number:</label>
                    <input required type="number" name="number" class="form-control" placeholder="Enter case number">
                </div>
                <div class="form-group">
                    <label>Case Type:</label>
                    <select required name="type" class="form-control">
                        <option value="SESSION">SESSION</option>
                        <option value="STC">STC</option>
                        <option value="GR">GR</option>
                        <option value="CR">CR</option>
                        <option value="APPEAL">APPEAL</option>
                        <option value="REVISION">REVISION</option>
                        <option value="MISC">MISC</option>
                        <option value="FS">FS</option>
                        <option value="TX">TX</option>
                        <option value="NS">NS</option>
                        <option value="MS">MS</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>My Party:</label>
                    <input required type="text" name="c_name" class="form-control" placeholder="Enter your party name">
                </div>
                <div class="form-group">
                    <label>My Party Address :</label>
                    <input required type="text" name="c_address" class="form-control" placeholder="Enter your party address">
                </div>

                <div class="form-group">
                    <label>My Party Phone:</label>
                    <input type="number" name="c_phone" class="form-control" placeholder="Enter your party contact Number">
                </div>

                <div class="form-group">
                    <label>Opponent Party:</label>
                    <input required type="text" name="o_name" class="form-control" placeholder="Enter opponent party name">
                </div>
                <div class="form-group">
                    <label>Opponent Party Address :</label>
                    <input required type="text" name="o_address" class="form-control" placeholder="Enter opponent party address">
                </div>

                <div class="form-group">
                    <label>Opponent Party Phone:</label>
                    <input required type="number" name="o_phone" class="form-control" placeholder="Enter your opponent party contact Number">
                </div>

                <div class="form-group">
                    <label>Next Date:</label>
                    <div class="input-append date form_datetime">
                        <input size="16" type="date" name="next_date" value="y-m-d" required>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Court Name:</label>
                    <select required name="court_name" class="form-control">
                        <option value="DJ">DJ</option>
                        <option value="ADJI">ADJI</option>
                        <option value="ADJL">ADJL</option>
                        <option value="SPECIAL COURT">SPECIAL COURT</option>
                        <option value="NS">NS</option>
                        <option value="JOINT COURT 1">JOINT COURT 1</option>
                        <option value="JOINT COURT 2">JOINT COURT 2</option>
                        <option value="JOINT COURT 3">JOINT COURT 3</option>
                        <option value="CJK">CJK</option>
                        <option value="ACJM">ACJM</option>
                        <option value="SJM 1">SJM 1</option>
                        <option value="SJM 2">SJM 2</option>
                        <option value="SJM 3">SJM 3</option>
                        <option value="SJM 4">SJM 4</option>
                        <option value="JM 1">JM 1</option>
                        <option value="JM 2">JM 2</option>
                        <option value="JM 3">JM 3</option>
                        <option value="JM 4">JM 4</option>
                        <option value="EXM">EXM</option>
                        <option value="DM">DM</option>
                        <option value="SAJ">SAJ</option>
                        <option value="CMM">CMM</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Court Type:</label>
                    <select  required name="court_type" class="form-control">
                        <option value="SR">SR</option>
                        <option value="WA">WA</option>
                        <option value="PH">PH</option>
                        <option value="PW">PW</option>
                        <option value="DW">DW</option>
                        <option value="CHARGE">CHARGE</option>
                        <option value="APPEAL">APPEAL</option>
                        <option value="ORDER">ORDER</option>
                        <option value="JUDGEMENT">JUDGEMENT</option>
                        <option value="HEARING">HEARING</option>
                        <option value="ATTENDANCE">ATTENDANCE</option>
                        <option value="BH">BH</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Genre:</label>
                    <input required name="court_genre" type="text" class="form-control" placeholder="Enter genre number">
                </div>

                <div class="form-group">
                    <label>Referred By:</label>
                    <input required name="referedby" type="text" class="form-control" placeholder="Enter reference name">
                </div>

                <div class="form-group">
                    <label>Comment:</label>
                    <input required name="comment" type="text" class="form-control" placeholder="Enter reference name">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit_case" value="SUBMIT" class="btn btn-default">
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
if (isset($_POST["submit_case"])){

    $case_number=$_POST["number"];
    $case_type=$_POST["type"];
    $complainant_name=$_POST["c_name"];
    $complainant_phone=$_POST["c_phone"];
    $complainant_address=$_POST["c_address"];
    $opponent_name=$_POST["o_name"];
    $opponent_phone=$_POST["o_phone"];
    $opponent_address=$_POST["o_address"];

    $today = isset($_POST['next_date']) ? $_POST['next_date'] : (new DateTime)->format('y-m-d');
    $date = date('Y-m-d', strtotime($today));
    $previous_date=$date;
    $next_date=$date;

    $court_name=$_POST["court_name"];
    $court_type=$_POST["court_type"];
    $court_genre=$_POST["court_genre"];
    $refered_by=$_POST["referedby"];
    $comment=$_POST["comment"];
    $u_id=$userid;
    $case_created=date("Y-m-d");
    $case_updated=date("Y-m-d");

    $db = new CaseOperations();
    echo $case_number,$case_type,$complainant_name,$complainant_phone,
    $complainant_address,$opponent_name,$opponent_phone,$opponent_address,$previous_date,$next_date,
    $court_name,$court_type,$court_genre,$refered_by,$comment,$u_id,$case_created,$case_updated;

    try{
        //create case by  call functions
        $result=$db->createCase($case_number,$case_type,$complainant_name,$complainant_phone,
            $complainant_address,$opponent_name,$opponent_phone,$opponent_address,$previous_date,$next_date,
            $court_name,$court_type,$court_genre,$refered_by,$comment,$u_id,$case_created,$case_updated);
        if($result==1){
            $message = "Case Added successfully";
            echo "<script>alert('$message');window.location.href='allcase.php';</script>";
        }else if ($result==2){
            $message= "Server Error";
            echo "<script>alert('$message');</script>";
        }else{
            $message= "There is an Unknown error";
            echo "<script>alert('$message');</script>";
        }
    } catch (PDOException $e){

    }
}
include_once("footer.php");
?>
