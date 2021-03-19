<?php

$connect = mysqli_connect("localhost", "Wang", "YES", "education fair");  

//delete all rows when delete button is clicked
if(isset($_POST['delete'])){

    $query = "DELETE FROM student_personal_info"; 
    $result = mysqli_query($connect,$query);

    //return to index.php page
    header("Location: export(index).php");
}
?>