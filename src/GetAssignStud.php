<?php
    include('../config/database_connect.php');
    $StaffID=$_POST['postStaffID'];

    $Query= "SELECT student_personal_info.First_Name, 
                    student_personal_info.Last_Name,
                    student_additional_info.HighestQualification,
                    student_additional_info.PreviousSchool,
                    student_additional_info.MarketingPreference, 
                    staff.Serving AS 'Student_ID' 
                    FROM staff INNER JOIN student_personal_info ON student_personal_info.Student_ID = staff.Serving
                            INNER JOIN student_additional_info ON student_additional_info.Student_ID = staff.Serving 
                            WHERE staff.Staff_ID=$StaffID";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    if($r!=NULL) {
        $First_Name = $r['First_Name'];
        $Last_Name = $r['Last_Name'];
        $Highest_Qual = $r['HighestQualification'];
        $Prev_School = $r['PreviousSchool'];
        $Market_Pref = $r['MarketingPreference'];
        $Assign_Stud = $r['Student_ID'];
        $data =" $First_Name ; $Last_Name ; $Highest_Qual ; $Prev_School ; $Market_Pref ; $Assign_Stud";
    } else { 
        $check = mysqli_query($link, "SELECT Serving FROM staff WHERE Staff_ID = $StaffID AND Serving IS NOT NULL");

        if ($check && mysqli_num_rows( $check )>0 ) { $data = "OddFail" ;} else {$data = "Fail"; }
    }

    
    echo $data;
?>