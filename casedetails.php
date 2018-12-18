<?php
session_start();
include_once('config/CaseOperations.php');
if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}

if(!(isset($_SESSION['usertypeid']) && $_SESSION['usertypeid'] != '')){
    $userid=$_SESSION['id'];
}else{
    $userid=$_SESSION['usertypeid'];
}
if(isset($_GET["nid"])) {
    $id = $_GET["nid"];
    $getcase = array();
    try {
        $db = new CaseOperations();
        $getcase = json_decode(json_encode($db->getAllCaseData($userid)), true);
    } catch (PDOException $e) {

    }
    foreach ($getcase as $case){
    if ($case['case_id']== $id) {
        ?>
        <div class="table-responsive">
            <form method="post" action="updatecase.php">
                <table class="table table-bordered">
                    <tr>
                        <td width="30%">Case Number</td>
                        <td width="70%"><?php echo $case['case_number']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Complaint Name</td>
                        <td width="70%"><?php echo $case['complainant_name']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Opponent Name</td>
                        <td width="70%"><?php echo $case['opponent_name']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Previous Date</td>
                        <td width="70%"><?php echo $case['previous_date']; ?></td>
                    </tr>
                        <tr>
                            <td width="30%">Next Date</td>
                            <input name="current_date" type="hidden" value="<?php echo $case['next_date']; ?>">
                            <td width="70%"><input id="nextdate" name="nextdate" type="date" min="<?php echo $case['next_date']; ?>" dataformatas="dd-mm-yyyy" value="<?php echo $case['next_date']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Case Type</td>
                            <td width="70%">
                                <select id="casetype" required name="casetype" class="form-control">
                                    <option value="<?php echo $case['case_type']; ?>"><?php echo $case['case_type']; ?></option>
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
                        </tr>
                        <tr>
                            <td width="30%">Court Name</td>
                            <td width="70%">
                                <select id="courtname" required name="courtname" class="form-control">
                                    <option value="<?php echo $case['court_name']; ?>"><?php echo $case['court_name']; ?></option>
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
                        </tr>
                        <tr>
                            <td width="30%">Court Type</td>
                            <td width="70%">
                                <select  id="courttype" required name="courttype" class="form-control">
                                    <option value="<?php echo $case['court_type']; ?>"><?php echo $case['court_type']; ?></option>
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
                        </tr>
                        <tr>
                            <td width="30%">Refered By</td>
                            <td width="70%"><?php echo $case['refered_by']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Court Genre</td>
                            <td width="70%"><input required id="casegenre" name="casegenre" type="text" value="<?php echo $case['court_genre']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Comment</td>
                            <td width="70%"><input required id="comment" name="comment" type="text" value="<?php echo $case['comment']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Complaint Address</td>
                            <td width="70%"><input required id="caddress" name="caddress" type="text" value="<?php echo $case['complainant_address']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Complaint Phone</td>
                            <td width="70%"><input required id="cphone" name="cphone" type="number" value="<?php echo $case['complainant_phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Opponent Address</td>
                            <td width="70%"><input required id="oaddress" name="oaddress" type="text" value="<?php echo $case['opponent_address']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="30%">Opponent Phone</td>
                            <td width="70%"><input required id="ophone" name="ophone" type="number" value="<?php echo $case['opponent_phone']; ?>"></td>
                        </tr>

                </table>
                <table style="width: 100%">
                    <tr>

                        <td><button id="update" type="submit"  id="update" name="update" class="btn btn-primary update"  value="<?php echo $id;?>">Update</button></td>
            </form>
                        <td><button id="<?php echo $id;?>" id="delete" name="delete" class="btn btn-danger delete"  value="">Delete</button></td>
                    </tr>
                </table>
        </div>

        <script>
            $(document).ready(function () {
                $('.delete').click(function () {
                    var case_id=$(this).attr("id");
                    if (window.confirm('Do you really want to delete?')) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                window.alert("Case Deleted "+case_id);
                                location.reload();
                            }
                        };
                        xmlhttp.open("GET", "deletecase.php?cid="+case_id, true);
                        xmlhttp.send();
                    }
                });
            });
        </script>
        <?php
    }
    }
}
        ?>