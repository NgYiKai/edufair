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
        $("#div_refresh").load("ShowQueue.php");
        setInterval(function() {
            $("#div_refresh").load("ShowQueue.php");
        }, 500);
    });

</script>
<body>
    <div class="container-Queue">
        <div class="wrap-table100cat">
            <table>
                <thead>
                    <tr>
                        <th class="column1">Current Student</th>
                        <th class="column1">Next Student</th>
                    </tr>
                </thead>
                <tr>
                    <td>
                        <div >
                            <table>
                                <tbody>
                                    <tr><td class="column1">Student_ID</td>  <td>Place_Holder</td></tr>
                                    <tr><td class="column1">First_Name</td>  <td>Place_Holder</td></tr>
                                    <tr><td class="column1">Last_Name</td>  <td>Place_Holder</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div >
                            <table>
                                <tbody>
                                    <tr><td class="column1">Student_ID</td>  <td>Place_Holder</td></tr>
                                    <tr><td class="column1">First_Name</td>  <td>Place_Holder</td></tr>
                                    <tr><td class="column1">Last_Name</td>  <td>Place_Holder</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="div_refresh"></div>
</body>
</html>