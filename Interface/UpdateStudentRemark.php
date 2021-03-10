<?php
    include('../config/database_connect.php');
    $StudID=$_POST['postStudID'];
    $Type=$_POST['postType'];

    $Status = false;
    $Data = "Fail";

    if($Type == "Update" || $Type == "Display") {
        $Check = "SELECT * FROM student_remark WHERE Student_ID='$StudID'";
        $cresult = mysqli_query($link, $Check);
        if(!mysqli_num_rows( $cresult )>0) {
            $Status = false;
        } else {
            $Status = true;
        }
    }

    if($Type == "Remove") {
        $Dquery="DELETE FROM `student_remark` WHERE `student_remark`.`Student_ID` = $StudID";
        mysqli_query($link, $Dquery);
        $Data = "Remove Success";
    }

    if($Type == "Update" ) {
        $Remark=$_POST['postRemark'];
        if( $Status == false ) {
            $Uquery = "INSERT INTO `student_remark` (`Student_ID`, `Remark`) VALUES ('$StudID', '$Remark')";
        } else {
            $Uquery = "UPDATE `student_remark` SET `Remark` = '$Remark' WHERE `student_remark`.`Student_ID` = $StudID";
        }
        mysqli_query($link, $Uquery);
        $Data = "Success Update";
    }

    if($Type == "Display" && $Status == true) {
        $Query="SELECT student_remark.Remark FROM student_remark WHERE Student_ID=$StudID";
        $query = $link->prepare($Query); // prepate a query
        $query->execute(); // actually perform the query
        $result = $query->get_result(); // retrieve the result so it can be used inside PHP
        $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
        //Storing Data From Personal_Info into variable
        if($r!=NULL) {
            $Data=$r['Remark'];
        } else { $Data = "Fail" ;}
    }

    echo $Data;


?>