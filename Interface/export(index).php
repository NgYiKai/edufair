<?php  
//Connect to database
include('config/database_connect.php');

//Sql query to join tables to be displayed
$query = "SELECT student_personal_info.Student_ID, student_personal_info.First_Name, student_personal_info.Last_Name, student_contact_info.Phone_Number, student_contact_info.Email, student_additional_info.PreviousSchool, student_additional_info.HighestQualification, student_additional_info.MarketingPreference, student_additional_info.Privacy, student_remark.Remark
          FROM student_personal_info
          INNER JOIN student_contact_info
          ON student_personal_info.Student_ID = student_contact_info.Student_ID
          INNER JOIN student_additional_info
          ON student_personal_info.Student_ID = student_additional_info.Student_ID
          INNER JOIN student_remark
          ON student_personal_info.Student_ID = student_remark.Student_ID";

$result = mysqli_query($link, $query);  
?>  

<!DOCTYPE html>  
<html>  
     <head>  
          <title>Export student's personal information</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
     </head>  
     <body>  
          <br /><br />  
          <div class="container" style="width:1500px;">  
               <h2 align="center">Export Student Data to Excel</h2> 
               <br>
               <h4 align="center">*Click "CSV Export" to export database to an excel file*</h4>
               <h4 align="center">*Click "Delete" to delete all data in database*</h4>                
               <br />  

               <!-- Create export and delete button -->
               <form method="post" action="export.php" align="center">  
                    <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
               </form>  
               <br>
               <form method="post" action="delete.php" align="center">
                    <input type="submit" name="delete" value="Delete" class="btn btn-success" />
               </form>
               <br />  

               <!-- Display database -->
               <div class="table-responsive" id="student_table">  
                    <table class="table table-bordered">  
                         <tr>  
                              <th width="5%">Student_ID</th>  
                              <th width="10%">First_Name</th>
                              <th width="10%">Last_Name</th> 
                              <th width="10%">Phone_Number</th>
                              <th width="15%">Email</th> 
                              <th width="10%">PreviousSchool</th> 
                              <th width="10%">HighestQualification</th> 
                              <th width="5%">MarketingPreference</th> 
                              <th width="5%">Privacy</th> 
                              <th width="25%">Remark</th> 
                         </tr>  
                    <?php  
                    while($row = mysqli_fetch_array($result))  
                    {  
                    ?>  
                         <tr>  
                              <td><?php echo $row["Student_ID"]; ?></td>  
                              <td><?php echo $row["First_Name"]; ?></td>  
                              <td><?php echo $row["Last_Name"]; ?></td>
                              <td><?php echo $row["Phone_Number"]; ?></td>  
                              <td><?php echo $row["Email"]; ?></td>    
                              <td><?php echo $row["PreviousSchool"]; ?></td>  
                              <td><?php echo $row["HighestQualification"]; ?></td>  
                              <td><?php echo $row["MarketingPreference"]; ?></td>  
                              <td><?php echo $row["Privacy"]; ?></td>
                              <td><?php echo $row["Remark"]; ?></td>   
                         </tr>  
                    <?php       
                    }  
                    ?>  
                    </table>  
               </div>  
          </div>  
     </body>  
</html>  