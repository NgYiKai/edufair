<?php
    session_start();
    $StaffID=$_SESSION['Staff_ID'];
    include('../config/database_connect.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $CurrentTime=date("Y-m-d H:i:s");
    $loop = "UPDATE `queue_Staff` SET `session` = '$CurrentTime' WHERE `queue_Staff`.`Staff_ID` = $StaffID";
    mysqli_query($link, $loop);

?>