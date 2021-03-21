<?php
    include('../config/database_connect.php');
    $StaffID=$_POST['postStaffID'];
    $Query="SELECT queue_Staff.Queue_Num FROM queue_Staff WHERE Staff_ID=$StaffID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    if($r!=NULL) {
        $QueueNum=$r['Queue_Num'];
    } else { $QueueNum = NULL ;}

    
    echo $QueueNum;
?>

