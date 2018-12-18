<?php
session_start();
include_once('config/CaseOperations.php');
if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
    $userid=$_SESSION['id'];
}else{
    $userid=$_SESSION['usertypeid'];
}
if(isset($_GET["cid"])) {
    $caseid=$_GET["cid"];
    $db=new CaseOperations();
    $db->DeleteCase($caseid);
}
?>