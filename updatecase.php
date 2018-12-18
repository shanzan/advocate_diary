<?php
@ob_start();
session_start();
include_once('config/CaseOperations.php');

if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}
if(isset($_POST["update"])) {
    $db = new CaseOperations();

    $caseid_id=$_POST["update"];
    $complainant_phone=$_POST['cphone'];
    $complainant_address=$_POST['caddress'];
    $opponent_phone=$_POST['ophone'];
    $opponent_address=$_POST['oaddress'];
    $current_date=$_POST['current_date'];

    $today = isset($_POST['nextdate']) ? $_POST['nextdate'] : (new DateTime)->format('y-m-d');
    $next_date = date('Y-m-d', strtotime($today));
    echo $current_date;

    $date=$db->getPreviousDate($caseid_id);
    $predate=explode(",",$date);
    $previous_date="";
    echo $predate[sizeof($predate)-1];
    echo $next_date;
    if ($current_date==$next_date){
        $previous_date=$date;
    }else{
        $previous_date=$date.",".$current_date;
    }
    $case_type=$_POST['casetype'];
    $court_name=$_POST['courtname'];
    $court_type=$_POST['courttype'];
    $court_genre=$_POST['casegenre'];
    $comment=$_POST['comment'];
    $case_updated=date("Y-m-d");

    $db=new CaseOperations();
    $result=$db->UpdateCase($case_type,$complainant_phone,
        $complainant_address,$opponent_phone,$opponent_address,$previous_date,$next_date,
        $court_name,$court_type,$court_genre,$comment,$case_updated,$caseid_id);
    if ($result==1){
        $message = "CASE UPDATE SUCCESSFULL";
        echo "<script>alert('$message');window.location.href='allcase.php';</script>";
    }else{
        $message = "SERVER ERROR";
        echo "<script>alert('$message');window.location.href='allcase.php';</script>";
    }
}
?>