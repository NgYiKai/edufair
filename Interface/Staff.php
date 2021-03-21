<?php
    
    include('../config/database_connect.php'); 
    session_start();

    if($_SESSION['Staff_ID'] != NULL) {
        $StaffID=$_SESSION['Staff_ID'];
    } else {
        header('Location:Staff-SignIn.php');
    }
    //Retreive Data Base on the Student_ID
    $Query="SELECT * FROM staff WHERE Staff_ID=$StaffID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    $Staff_First_Name = $r['First_Name'];
    $Staff_Last_Name  = $r['Last_Name'];
    $Staff_Type = $r['Type'];

    if($Staff_Type == "Admin") {
        header('Location:../Admin_Interface/Admin.php');
      }

    $NA ="Not Assign";

    $Student_First_Name = $NA;
    $Student_Last_Name = $NA;
    $Student_High_Qual = $NA;
    $Student_Prev_School = $NA;
    $Student_M_Pref = $NA;

    $text = "This is just a placeholder :)";

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../design/StaffStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    var StaffID = <?php echo $_SESSION['Staff_ID']?>;

    var GetNext = 0;

    var btn = document.getElementById("GetNextButton");

    var NA = "Not Assign";
    var QN;

    var Stu_FN=NA;
    var Stu_LN=NA;
    var Stu_HQ=NA;
    var Stu_PS=NA;
    var Stu_MP=NA;
    var assignStudID = NA;

    function button_GetNext() {
        btn = document.getElementById("GetNextButton");
        if(GetNext == 1) {
            btn.className = "button-GetNext";
            btn.childNodes[0].textContent ="Get Next";
            GetNext = 0;
        } else { 
            btn.className = "button-Queuing";
            GetNext = 1;
            $("#InsertDIV").load('../Database_Insert_Script/Insert_Queue_Staff.php');
            button_Clear();
        }
    }
    
    function button_Clear() {
        if(assignStudID != NA) {
            assignStudID = NA;
            console.log("clearing");
            clearAssign();
            document.getElementById("RemarkBox").value = "";
            

        }
    }

    function displayData() {
        if(assignStudID != "Empty") {
            document.getElementById("SFN").innerHTML = Stu_FN;
            document.getElementById("SLN").innerHTML = Stu_LN;
            document.getElementById("SHQ").innerHTML = Stu_HQ;
            document.getElementById("SPS").innerHTML = Stu_PS;
            document.getElementById("SMP").innerHTML = Stu_MP;
        }
        if(assignStudID == "Empty") {
            document.getElementById("SFN").innerHTML = NA;
            document.getElementById("SLN").innerHTML = NA;
            document.getElementById("SHQ").innerHTML = NA;
            document.getElementById("SPS").innerHTML = NA;
            document.getElementById("SMP").innerHTML = NA;
        }
    }

    function clearAssign() {
        $("#div_clearAssign").load("clearAssign.php");
    }

    function RetrieveStudInfo() {
        $.post('GetAssignStud.php',{postStaffID:StaffID},
        function(data){
            if(data!="Fail") {
                var array = data.split(' ; ');
                Stu_FN = array[0];
                Stu_LN = array[1];
                Stu_HQ = array[2];
                Stu_PS = array[3];
                Stu_MP = array[4];
                assignStudID = array[5]; 
                document.getElementById('RemarkBox').readOnly = false;
                document.getElementById("button_Update").disabled = false;
                document.getElementById("button_Refresh").disabled = false;
                document.getElementById("button_Remove").disabled = false;

            } else {
                Stu_FN=NA;
                Stu_LN=NA;
                Stu_HQ=NA;
                Stu_PS=NA;
                Stu_MP=NA;
                assignStudID = NA; 
                RemarkLock="FALSE";
                document.getElementById("RemarkBox").value = "";
                document.getElementById('RemarkBox').readOnly = true;
                document.getElementById("button_Update").disabled = true;
                document.getElementById("button_Refresh").disabled = true;
                document.getElementById("button_Remove").disabled = true;

            }
        });
    }

    function UpdateTimeStamp() {
        $("#div_refresh").load("UpdateStaffTimeStamp.php");
    }

    function DisplayQueueNumber() {
        $.post('ShowStaffQueueNumber.php',{postStaffID:StaffID},
        function(data){
            var num = parseInt(data) || 0;
            if(num==0){
                QN= "...";
            } else {
                QN=" (" + num + ")";
            }
        });
    }

    function RefreshRemark() {
        console.log("Refresh Remark");
        document.getElementById("RemarkBox").value = "";
        DisplayRemarkText();
        
    }

    function RemoveRemark() {
        console.log("Remove Remark");
        document.getElementById("RemarkBox").value = "";
        $.post('UpdateStudentRemark.php',{postStudID:assignStudID,postType:"Remove"},
            function(data){
                console.log(data);
            });
    }

    function UpdateRemark() {
        var Remark = document.getElementById("RemarkBox").value;
        if(Remark!=""){
            console.log(Remark);
            $.post('UpdateStudentRemark.php',{postStudID:assignStudID,postType:"Update",postRemark:Remark},
                function(data){
                    console.log(data);
                });
        } else {
            RemoveRemark();
        }
    }

    var RemarkLock = "FALSE";
    function DisplayRemarkText() {
        console.log("Displaying Remark");
        if(assignStudID != NA) {
            $.post('UpdateStudentRemark.php',{postStudID:assignStudID,postType:"Display"},
            function(data){
                if(document.getElementById("RemarkBox").value != "") {
                    RemarkLock="TRUE";
                }
                if(data != "Fail") {
                    document.getElementById("RemarkBox").value = data;
                    RemarkLock="TRUE";
                }
            });
        }
    }

    $(document).ready(function(){
        if(GetNext == 1) {
            UpdateTimeStamp();
            DisplayQueueNumber();
        }
        RetrieveStudInfo();
        displayData();
        DisplayRemarkText();
        setInterval(function() {
            if(GetNext == 1 && assignStudID == NA ) {
                UpdateTimeStamp();
                btn.childNodes[0].textContent =  "Queuing" + QN;
                if(QN == "...") {
                    $("#InsertDIV").load('../Database_Insert_Script/Insert_Queue_Staff.php');
                }
            }
            if(GetNext == 1 && assignStudID != NA) {
                button_GetNext();
                DisplayRemarkText();
                RemarkLock ="FALSE";
                
            }
            if(RemarkLock == "FALSE") {
                DisplayRemarkText();
            } 
            // if(assignStudID == NA) {
            //     document.getElementById("RemarkBox").value = "";
            // }
            // if(document.getElementById("RemarkBox").value == "") {
            //     DisplayRemarkText();
            // }

            DisplayQueueNumber();
            RetrieveStudInfo();
            displayData();
        }, 500); 
    });

</script>
<body>
    <div class="container-Staff">
        <div class="wrap-table100cat">
            <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>
            <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-Signin.php'">Log Out</button>
            <br><br><br><br>
            <button onClick="button_GetNext()" id="GetNextButton" class="button-GetNext"style="float: right"><span>Get Next</span></button>
            <button onClick="button_Clear()" class="button-Clear" style="float: right;">Clear</button>
            <!-- <br><br><br> -->
            <table>
                <colgroup>
                    <col class="columnleft"/>
                    <col/>
                </colgroup>
                <tbody>
                    <tr>
                        <th> First Name </th>
                        <td id="SFN"> <?php echo $Student_First_Name ?> </td>
                    </tr>
                    <tr>
                        <th> Last Name </th>
                        <td id="SLN"> <?php echo $Student_Last_Name ?> </td>
                    </tr>
                    <tr>
                        <th> Highest Qualification </th>
                        <td id="SHQ"> <?php echo $Student_High_Qual ?> </td>
                    </tr>
                    <tr>
                        <th> Previous School </th>
                        <td id="SPS"> <?php echo $Student_Prev_School ?> </td>
                    </tr>
                    <tr>
                        <th> Marketing Preference </th>
                        <td id="SMP"> <?php echo $Student_M_Pref ?> </td>
                    </tr>
                </tbody>


            </table>
            <br><br>
            <div id="div_GetRemark" style="display: none;"></div>
            <div id="div_clearAssign" style="display: none;"></div>
            <div id="InsertDIV" style="display: none;"></div>
            <div id="div_refresh" style="display: none;"></div>
            <div id="deleteStafffromQueue" style="display: none;"></div>
            <!-- <form> -->
                
                <button id="button_Update" onclick="UpdateRemark()"  class="button-Update"style="float: right;">Update</button>
                <button id="button_Refresh" onclick="RefreshRemark()"  class="button-Refresh"style="float: left;">  &#10227 </button>
                <button id="button_Remove" onclick="RemoveRemark()"  class="button-Remove"style="float: right;"> &#x2716</button>
                <br><br>
                <textarea class ="remarkBox" type="text" id ="RemarkBox" placeholder ="<?php echo $text?>"></textarea>
                
            <!-- </form> -->
        </div>
    </div>
</body>
</html>

<?php
    if ($_GET) {
        if (isset($_GET['insert'])) {
            insert();
        } elseif (isset($_GET['select'])) {
            select();
        }
    }

    function select()
    {
       echo "The select function is called.";
    }

    function insert()
    {
       echo "The insert function is called.";
    }
?>