<?php
    include('../config/database_connect.php');
    $StudentID=$_POST['postStudID'];

    $Query= "SELECT staff.First_Name, staff.Last_Name, staff.Display_Name, staff.Staff_ID FROM staff WHERE staff.Serving=$StudentID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    if($r!=NULL) {
        $First_Name = $r['First_Name'];
        $Last_Name = $r['Last_Name'];
        $Display_Name = $r['Display_Name'];
        $Assign_Staff = $r['Staff_ID'];
        $data =" $First_Name ; $Last_Name ; $Display_Name ; $Assign_Staff";
    } else { $data = "Fail" ;}

    
    echo $data;
?>