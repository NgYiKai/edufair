<?php
  session_start();
  include('../../config/database_connect.php');
  if($_SESSION['Staff_ID'] != NULL) {
    $StaffID=$_SESSION['Staff_ID'];
  } else {
    header('Location:Staff-SignIn.php');
  }

  $Query="SELECT * FROM staff WHERE Staff_ID=$StaffID";
  $query = $link->prepare($Query); // prepate a query
  $query->execute(); // actually perform the query
  $result = $query->get_result(); // retrieve the result so it can be used inside PHP
  $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
  //Storing Data From Personal_Info into variable
  $Staff_First_Name = $r['First_Name'];
  $Staff_Last_Name  = $r['Last_Name'];
  $Staff_Type = $r['Type'];

  if($Staff_Type == "Counselor") {
    header('Location:Staff.php');
  }

  $text = "HEHE";


?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../design/AdminStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>

    var flag;

    var initial_log="Welcome <?php echo "$Staff_Last_Name $Staff_First_Name" ?> ";
    var log_Message = "";
    var date_format ='DD-MM-YY h:mm:ss A';

    function log( errorType, errorMessage) {
        var initial_append_log = " [Undefined] : ";
        var now = new moment();
        var log = document.getElementById("Log");
        
        if(errorType == 1) {
            initial_append_log = " [Notice] : ";
        }
        if(errorType == 2) {
            initial_append_log = " [Prevention] : ";
        }
        if(errorType == 3) {
            initial_append_log = " [Error] : ";
        }
        if(errorType == 4) {
            initial_append_log = " [Action] : ";
        }

        log_Message = log_Message + "\r\n" + now.format(date_format) + initial_append_log + errorMessage;
        log.value = initial_log + log_Message;
        log.scrollTop = log.scrollHeight;
        sessionStorage.setItem("Log", log_Message);
    }


    function Auto_Button() {
        if (flag == 0) {
            document.getElementById("EAutoB").className = "DotG";
            document.getElementById("Auto_Status").innerHTML = "Disable";
            sessionStorage.setItem("AutoAssign", "Enabled");
            flag = 1;

            log(1,"Counselor System Enabled!");
            

        } else {
            document.getElementById("EAutoB").className = "DotR";
            document.getElementById("Auto_Status").innerHTML = "Enable";
            sessionStorage.setItem("AutoAssign", "Disabled");
            flag = 0;

            log(1,"Counselor System Disabled!");
        }
    }

    function R_Staff_Q() {
        $.post('../../src/Admin_Couselor_Functions.php',{postType:"Staff_Q"},
            function(data){
                if(data == "TRUE") {
                    log(1,"Staff Queue Reset Successful!");
                } else {
                    log(3,"Staff Queue Reset Failed!");
                }
            });
    }

    function R_Stud_Q() {
        $.post('../../src/Admin_Couselor_Functions.php',{postType:"Stud_Q"},
            function(data){
                if(data == "TRUE") {
                    log(1,"Student Queue Reset Successful!");
                } else {
                    log(3,"Student Queue Reset Failed!");
                }
            });
    }

    function R_A_Stud() {
        $.post('../../src/Admin_Couselor_Functions.php',{postType:"R_A_Stud"},
            function(data){

                if(data == "TRUE") {
                    log(1,"Assigned Student Reset Successful!");
                } else {
                    log(3,"Assigned Student Reset Failed!");
                }
            });
    }

    function C_Log() {
        sessionStorage.setItem("Log", "");
        log_Message = "";
        document.getElementById("Log").value = initial_log;
    }

    function D_FL_Message() {
        if(sessionStorage.getItem("lock_Message") == 1 ) {
            sessionStorage.setItem("lock_Message", 0);
            log(4,"Disabling Message For Removal of File Lock");
            document.getElementById("F_L_M").innerHTML = "Enable";
        } else {
            sessionStorage.setItem("lock_Message", 1);
            log(4,"Enabling Message For Removal of File Lock");
            document.getElementById("F_L_M").innerHTML = "Disable";
        }
    }

    $(document).ready(function(){
        sessionStorage.getItem("lock_Message")==1 ? document.getElementById("F_L_M").innerHTML = "Disable" : document.getElementById("F_L_M").innerHTML = "Enable";
        var check = sessionStorage.getItem("AutoAssign");
        log_Message = sessionStorage.getItem("Log");
        if(log_Message) {
            document.getElementById("Log").value = initial_log + log_Message;
            document.getElementById("Log").scrollTop = document.getElementById("Log").scrollHeight;
        }
        if (check == "Enabled") {
            flag = 1;
            document.getElementById("Auto_Status").innerHTML = "Disable";
            document.getElementById("EAutoB").className = "DotG";
        } else {
            flag = 0;
            document.getElementById("Auto_Status").innerHTML = "Enable";
            document.getElementById("EAutoB").className = "DotR";
        }
        document.getElementById("Log").scrollTop = document.getElementById("Log").scrollHeight;
        setInterval(function() {
            if(flag == 1) {
                $("#div_refresh_Assign").load("../../src/AssignStudToStaff.php");
            }
            
        }, 1000);
    });

    $(document).ready(function(){
        setInterval(function() {
            if(flag == 1) {
                $("#div_refresh_Assign").load("../../src/clearLocking.php");
                if(sessionStorage.getItem("lock_Message")==1)log(2,"Removing File Lock!");
            }
        }, 5000);
    });

</script>
<body>
    <span id="div_refresh_Assign" style="display: none;"></span>
    <br>
    <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>
    <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-SignIn.php'">Log Out</button>
    <!-- <button class="activeButton" style="float: right" onClick = "Auto_Button()">
        <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Auto Assign
    </button> -->

    <br><br><br>

    <ul>
        <li><a class="active" href="Admin.php">Home</a></li>
        <li><a href="accountManage.php">Account Management</a></li>
        <li><a href="AdminQueue.php">Queue</a></li>
        <li><a href="databaseManage.php">Database Management</a></li>
        <li><a href="export.php">Database Export</a></li>

        <li style="float:right"><button class="activeButton" onClick = "Auto_Button()">
            <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Counselor System
        </button></li>
    </ul>

    <br><br><br><br><br>

    <div>
        <button class="LogOut"onClick = "R_Stud_Q()"> Reset Student Queue</button>
        <br><br><br>
        <button class="LogOut" onClick = "R_Staff_Q()"> Reset Staff Queue</button>
        <br><br><br>
        <button class="LogOut" onClick = "R_A_Stud()"> Reset Assigned Student</button>
        <br><br><br>
        <button class="LogOut" onClick = "D_FL_Message()"> <span id = "F_L_M"></span> File Lock Message</button>

    </div>
    <br><br><br>
    <button class="LogOut" onClick = "C_Log()"> Clear Log</button><br>
    <div class="remarkContainer">
        <textarea  class ="remarkBox" type="text"  id = "Log" disabled>Welcome <?php echo "$Staff_Last_Name $Staff_First_Name" ?> </textarea>

    </div>
</body>
</html>