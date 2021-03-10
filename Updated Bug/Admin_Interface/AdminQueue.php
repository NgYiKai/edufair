<?php
  session_start();
  include('../config/database_connect.php');
  
  $Counseler_ID=1;
  $_SESSION['Counseler_ID'] = $Counseler_ID;
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../design/style.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
        $("#div_refresh_Student").load("ShowQueue.php");
        $("#div_refresh_Staff").load("ShowStaffQueue.php");
        $("#div_refresh_assign").load("AssignStudToStaff.php");
        setInterval(function() {
            $("#div_refresh_Student").load("ShowQueue.php");
            $("#div_refresh_Staff").load("ShowStaffQueue.php");
            $("#div_refresh_Assign").load("AssignStudToStaff.php");
        }, 500);
    });

</script>
<body>
    <div id="div_refresh_Student"></div>
    <span id="div_refresh_Staff"></span>
    <span id="div_refresh_Assign" style="display: none;"></span>
</body>
</html>