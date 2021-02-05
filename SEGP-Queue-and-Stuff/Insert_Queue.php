<?php
    session_start();
    $Database_Name = "softwareeng";
    $link = mysqli_connect("localhost", "root", "", $Database_Name);
    $Student_ID=$_SESSION['Student_ID'];

    $POSTCount = 1; //Initialise variable
    //Check if the queue record exist
    $csql = "SELECT * FROM queue WHERE Student_ID='$Student_ID'";
    $cresult = mysqli_query($link, $csql);
    if($cresult) 
    {   if( mysqli_num_rows( $cresult )>0 )
        {   $dsql = "DELETE FROM queue WHERE queue.Student_ID = '$Student_ID'";
            mysqli_query($link,$dsql);  
            echo "record deleted";
        } 
    }
    //AutoIncrement for queue number
    $query          =   $link->prepare("SELECT Queue_Num FROM queue ORDER BY Queue_Num DESC LIMIT 1"); // prepate a query
    $query          ->  execute(); // actually perform the query
    $result         =   $query->get_result(); // retrieve the result so it can be used inside PHP
    $r              =   $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    $CurrentCount   =   $r['Queue_Num'];

    if( !is_null( $CurrentCount ) )   { $POSTCount=$CurrentCount+1; }
            
    $sql1 = "INSERT INTO `queue` (`Student_ID`,`Queue_Num`) VALUES ('$Student_ID','$POSTCount')";
    //Error checking and submiting query
    $ErrorCount = 0; //Variable to stop or continue webpage redirect
    if( mysqli_query( $link, $sql1 ) )  { echo "Records added successfully to queue.<br/>" ; }
    else
    {   ++$ErrorCount;
        echo "ERROR: Could not able to execute $sql1. <br/>" . mysqli_error($link); }
    echo "Client View";
    if($ErrorCount == 0)    { header('Location:Interface/ClientQueue.php'); }
    exit;
?>