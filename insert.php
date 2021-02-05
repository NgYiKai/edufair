<?php
   $conn = mysqli_connect('localhost','yk','abc123','education fair');

   if(!$conn){
       echo 'Connection error:' .mysqli_connect_error();
   }

    if(isset($_GET['First_Name'])){
            $first = $_GET['First_Name'];
            $last = $_GET['Last_Name'];
            $id = $_GET['Student_ID'];
            $age = $_GET['Age'];
            $school = $_GET['School'];
            $phone = $_GET['Phone'];
            $email = $_GET['Email'];
            $marketing = $_GET['Marketing'];
            $qualification = $_GET['Qualification'];

            $sql1 = "INSERT INTO personal_info (First_Name, Last_Name, Student_ID,Age) VALUES ('$first', '$last','$id','$age')";
            $sql2 = "INSERT INTO contact_info (Phone_Number, Email, Student_ID       ) VALUES ('$phone', '$email','$id')";
            $sql3 = "INSERT INTO additional_info (Previous_School, Highest_Qualification, Student_ID,Marketing_Preference) VALUES ('$school', '$qualification','$id','$marketing')";
            mysqli_query($conn, $sql1); 
            mysqli_query($conn, $sql2); 
            mysqli_query($conn, $sql3); 
    }


?>

<!DOCTYPE html>
<html>
<head>  
    <title>Select</title>
</head>

<body >
           
        
<?php

if (!empty($_GET['table'])) {
    $insert=$_GET['table'];
}

            echo '<form method="get">
            <input type="text" name="Student_ID" placeholder="Student ID">
            </br>
            <input type="text" name="First_Name" placeholder="First Name">
            </br>
            <input type="text" name="Last_Name" placeholder="Last Name">
            </br>
            <input type="text" name="Age" placeholder="Age  ">
            </br>
            <input type="text" name="School" placeholder="Previous School  ">
            </br>
            <input type="text" name="Qualification" placeholder="Highest Qualification  ">
            </br>
            <input type="text" name="Phone" placeholder="Phone Number  ">
            </br>
            <input type="text" name="Email" placeholder="Email  ">
            </br>

            <input type="checkbox" name="Marketing" value="Marketing">
            <label> Do you want to receive marketing news from UNMC?</label>
            </br>



            <input type="submit" name="button" value="Insert">
             </form>';   
   
?>

</body>
</html> 