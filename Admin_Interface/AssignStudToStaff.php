<?php


    include('../config/database_connect.php');
    
    $reorder  = "SET @i:=0;";
    $reorder .= "UPDATE queue SET Queue_Num = @i:=(@i+1) WHERE 1=1;";
    $reorder .= "SET @i:=0;";
    $reorder .= "UPDATE queue_Staff SET Queue_Num = @i:=(@i+1) WHERE 1=1;";
    $link -> multi_query($reorder);
    $link -> close();

    include('../config/database_connect.php');


    
    $Query          =   "SELECT queue_staff.Staff_ID,queue.Student_ID, queue.Queue_Num FROM queue CROSS JOIN queue_staff WHERE queue.Queue_Num = 1 AND queue_Staff.Queue_Num = 1 ORDER BY Queue_Num ASC LIMIT 1";
    $query          =   $link->prepare($Query); // prepate a query
    $query          ->  execute(); // actually perform the query
    $result         =   $query->get_result(); // retrieve the result so it can be used inside PHP
    $r              =   $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    $Student_ID     =   $r['Student_ID'];
    $Staff_ID       =   $r['Staff_ID'];

    $check ="SELECT * FROM staff WHERE Serving = $Student_ID";
    $flag=mysqli_query($link, $check);
    if(mysqli_num_rows( $flag )>0) {
    }
    else {
        $ServingSql = "UPDATE staff SET Serving = $Student_ID WHERE Staff_ID=$Staff_ID ";
        mysqli_query( $link, $ServingSql );
        
        $DeleteStaffSql ="  DELETE queue, queue_staff
                            FROM queue
                            INNER JOIN queue_staff ON queue.Queue_Num = queue_staff.Queue_Num
                            WHERE queue.Student_ID = $Student_ID AND queue_staff.Staff_ID=$Staff_ID;";
        mysqli_query( $link, $DeleteStaffSql );

    }



?>