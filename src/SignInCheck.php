<?php
    $_SESSION = array();
    include('../config/database_connect.php');
    $UN = $_POST['uname'];
    $PW = $_POST['psw'];


    $Query="SELECT Staff_ID, Type From Staff WHERE staff.Username = '$UN' && staff.Password = '$PW'";
    $query = $link->prepare($Query); // prepate a query
    $query->execute(); // actually perform the query
    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    //Storing Data From Personal_Info into variable
    $StaffID=$r['Staff_ID'];
    $Type=$r['Type'];
    if($r>0) {
        session_start();
        $_SESSION['Staff_ID'] = $StaffID;
        if($Type == "Admin") { header('Location:../public/admin/Admin.php'); } 
        if($Type == "Counselor") { header('Location:../public/admin/Staff.php'); }
        
    } else {
        header('Location:../public/admin/Staff-SignIn.php');
    }
    
?>