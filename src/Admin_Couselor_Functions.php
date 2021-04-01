<?php 

    include('../config/database_connect.php');

    $Type=$_POST['postType'];

    $Data = "FALSE";

    if( $Type== "Staff_Q") {

        if (mysqli_query( $link, "DELETE FROM queue_staff" )) {
            $Data = "TRUE";
        } 
    }

    if( $Type== "Stud_Q") {

        if (mysqli_query( $link, "DELETE FROM queue" )) {
            $Data = "TRUE";
        } 
    }

    if( $Type== "R_A_Stud") {

        if (mysqli_query( $link, "UPDATE staff SET Serving = NULL" )) {
            $Data = "TRUE";
        } 
    }

    echo $Data;


?>