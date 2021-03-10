<?php
    $Database_Name = "education fair";
    $link = mysqli_connect("localhost", "root", "", $Database_Name);

    if (!$link){
        echo 'Connection error:' . mysqli_connect_error();
    }
?>
