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

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../design/AdminStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    var flag;

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

    $(document).ready(function(){
        var check = sessionStorage.getItem("AutoAssign");
        log_Message = sessionStorage.getItem("Log");

        if (check == "Enabled") {
            flag = 1;
            document.getElementById("Auto_Status").innerHTML = "Disable";
            document.getElementById("EAutoB").className = "DotG";
        } else {
            flag = 0;
            document.getElementById("Auto_Status").innerHTML = "Enable";
            document.getElementById("EAutoB").className = "DotR";
        }
        $("#div_refresh_Student").load("../../src/ShowQueue.php");
        $("#div_refresh_Staff").load("../../src/ShowStaffQueue.php");
        setInterval(function() {
            if(flag == 1) {
                $("#div_refresh_Assign").load("../../src/AssignStudToStaff.php");
            }
            $("#div_refresh_Student").load("../../src/ShowQueue.php");
            $("#div_refresh_Staff").load("../../src/ShowStaffQueue.php");
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

    <br>
    <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>

    <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-SignIn.php'">Log Out</button>

    <!-- <button class="LogOut" style="float: right" onClick = "Auto_Button()">
        <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Auto Assign
    </button> -->

    <br><br><br>
    <ul>

        <li><a href="Admin.php">Home</a></li>
        <li><a href="accountManage.php">Account Management</a></li>
        <li><a class="active" href="AdminQueue.php">Queue</a></li>
        <li><a href="databaseManage.php">Database Management</a></li>
        <li><a href="export.php">Database Export</a></li>

        <li style="float:right"><button class="activeButton" onClick = "Auto_Button()">
            <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Counselor System
        </button></li>
    </ul>


    <br><br>
    <div id="div_refresh_Student"></div>
    <span id="div_refresh_Staff"></span>
    <span id="div_refresh_Assign" style="display: none;"></span>

</body>
</html>