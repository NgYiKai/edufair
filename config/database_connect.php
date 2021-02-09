<?php
    $Database_Name = "education fair";
    $link = mysqli_connect("localhost", "abc123", "abc123", $Database_Name);

    if (!$link){
        echo 'Connection error:' . mysqli_connect_error();
    }
?>
