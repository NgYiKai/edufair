<?php
    session_start();
    include('../config/database_connect.php');
    $Staff_ID=$_SESSION['Staff_ID'];

    $POSTCount = 1; //Initialise variable
    //Check if the queue record exist
    $csql = "SELECT * FROM queue_Staff WHERE Staff_ID='$Staff_ID'";
    $cresult = mysqli_query($link, $csql);
    if($cresult) 
    {   if( mysqli_num_rows( $cresult )>0 )
        {   $dsql = "DELETE FROM queue_Staff WHERE queue_Staff.Staff_ID = '$Staff_ID'";
            mysqli_query($link,$dsql);  
            echo "record deleted";
        } 
    }
    //AutoIncrement for queue number
    $query          =   $link->prepare("SELECT Queue_Num FROM queue_Staff ORDER BY Queue_Num DESC LIMIT 1"); // prepate a query
    $query          ->  execute(); // actually perform the query
    $result         =   $query->get_result(); // retrieve the result so it can be used inside PHP
    $r              =   $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    $CurrentCount   =   $r['Queue_Num'];

    if( !is_null( $CurrentCount ) )   { $POSTCount=$CurrentCount+1; }
            
    $sql1 = "INSERT INTO `queue_Staff` (`Staff_ID`,`Queue_Num`) VALUES ('$Staff_ID','$POSTCount')";
    mysqli_query( $link, $sql1 );
    exit;
?>