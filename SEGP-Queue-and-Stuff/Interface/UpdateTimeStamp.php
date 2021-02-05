<?php
    session_start();
    $StudentID=$_SESSION['Student_ID'];
    $Database_Name = "softwareeng";
    $link = mysqli_connect("localhost", "root", "", $Database_Name);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $CurrentTime=date("Y-m-d H:i:s");
    $loop = "UPDATE `queue` SET `session` = '$CurrentTime' WHERE `queue`.`Student_ID` = $StudentID";
    mysqli_query($link, $loop);
?>