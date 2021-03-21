<?php
    include('../config/database_connect.php');
    session_start();
    $StaffID=$_SESSION['Staff_ID'];

    $ServingSql = "UPDATE staff SET Serving = NULL WHERE Staff_ID=$StaffID";
    mysqli_query( $link, $ServingSql );
?>