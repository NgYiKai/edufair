<?php
    //Start Session between insert.php and testing(2).php
    session_start();
    $Database_Name  = "softwareeng";
    $link           = mysqli_connect("localhost", "root", "", $Database_Name);

    // Check connection
    if($link === false) { die("ERROR: Could not connect. " . mysqli_connect_error()); }

    //Variable POST from input_info.php
    $First_Name             = $_POST['First_Name'];
    $Last_Name              = $_POST['Last_Name'];
    $Phone_Number           = $_POST['Phone_Number'];
    $Email                  = $_POST['Email'];
    $HighestQualification   = $_POST['HighestQualification'];
    $PreviousSchool         = $_POST['PreviousSchool'];
    $notify                 = $_POST['notify'];


    //Auto increment for student ID
    $POSTCount      =   1;
    $query          =   $link   ->  prepare( "SELECT Student_ID FROM personal_info ORDER BY Student_ID DESC LIMIT 1" ); // prepate a query
    $query          ->  execute(); // actually perform the query
    $result         =   $query  ->  get_result(); // retrieve the result so it can be used inside PHP
    $r              =   $result ->  fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
    $CurrentCount   =   $r['Student_ID'];
    if(!is_null($CurrentCount)) { $POSTCount=$CurrentCount+1; }

    //Sending Student_ID to testing(2).php to get the details from database
    $_SESSION['Student_ID'] = $POSTCount;

    // Query Initialisation
    $sql1 = "INSERT INTO `personal_info` (`Student_ID`,`First_Name`,`Last_Name`) VALUES ('$POSTCount', '$First_Name','$Last_Name')";
    $sql2 = "INSERT INTO `additional_info` (`Student_ID`,`PreviousSchool`,`HighestQualification`, `MarketingPreference`) VALUES ('$POSTCount','$PreviousSchool','$HighestQualification','$notify')"; 
    $sql3 = "INSERT INTO `contact_info` (`Student_ID`,`Phone_Number`,`Email`) VALUES ('$POSTCount','$Phone_Number','$Email')";

    //Error checking and submiting query
    $ErrorCount = 0; //Variable to stop or continue webpage redirect

    if(mysqli_query($link, $sql1))
    {   echo "Records added successfully to personal_info.<br/>" ; }
    else
    {   ++$ErrorCount;
        echo "ERROR: Could not able to execute $sql1. <br/>" . mysqli_error($link);
    }

    if(mysqli_query($link, $sql2))  
    {   echo "Records added successfully to additional_info.<br/>"; }
    else
    {   ++$ErrorCount;
        echo "ERROR: Could not able to execute $sql2.<br/> " . mysqli_error($link);
    }

    if(mysqli_query($link, $sql3))
    {   echo "Records added successfully to contact_info.<br/>"; }
    else
    {   ++$ErrorCount;
        echo "ERROR: Could not able to execute $sql3.<br/> " . mysqli_error($link);
    }

    echo $ErrorCount." Error Found.";
    if($ErrorCount == 0)    { header('Location:Interface/menu_page.php'); }
    exit;

?>
