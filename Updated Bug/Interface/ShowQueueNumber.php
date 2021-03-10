<?php
    include('../config/database_connect.php');
    $StudentID=$_POST['postStudID'];
    $Query="SELECT queue.Queue_Num FROM queue WHERE Student_ID=$StudentID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    $QueueNum=$r['Queue_Num'];
    if($QueueNum==null) {
        include('../Database_Insert_Script/Insert_Queue.php');
    }
    echo $QueueNum;
?>

