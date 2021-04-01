
<?php
  session_start();
  include('../../config/database_connect.php');

  if($_SESSION['Staff_ID'] != NULL) {
    $StaffID=$_SESSION['Staff_ID'];
  } else {
    header('Location:Staff-SignIn.php');
  }

  $Query="SELECT * FROM staff WHERE Staff_ID=$StaffID";
  $query = $link->prepare($Query); // prepate a query
  $query->execute(); // actually perform the query
  $result = $query->get_result(); // retrieve the result so it can be used inside PHP
  $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
  //Storing Data From Personal_Info into variable
  $Staff_First_Name = $r['First_Name'];
  $Staff_Last_Name  = $r['Last_Name'];
  $Staff_Type = $r['Type'];

  if($Staff_Type == "Counselor") {
    header('Location:Staff.php');
  }


     //Sql query to join tables to be displayed
     $query = "SELECT student_personal_info.Student_ID, student_personal_info.First_Name, student_personal_info.Last_Name, student_contact_info.Phone_Number, student_contact_info.Email, student_additional_info.PreviousSchool, student_additional_info.HighestQualification, student_additional_info.MarketingPreference, student_additional_info.Privacy, student_remark.Remark
     FROM student_personal_info
     INNER JOIN student_contact_info
     ON student_personal_info.Student_ID = student_contact_info.Student_ID
     INNER JOIN student_additional_info
     ON student_personal_info.Student_ID = student_additional_info.Student_ID
     LEFT JOIN student_remark
     ON student_personal_info.Student_ID = student_remark.Student_ID";

     $result1 = mysqli_query($link, $query); 
?>

<!DOCTYPE html>
<html>
<!-- <link rel="stylesheet" type="text/css" href="../../design/AdminStyle.css"> -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script>
     var flag;

     var date_format ='DD-MM-YY h:mm:ss A';

     function log( errorType, errorMessage) {
     var initial_append_log = " [Undefined] : ";
     var now = new moment();
     var log = document.getElementById("Log");
     
     if(errorType == 1) {
          initial_append_log = " [Notice] : ";
     }
     if(errorType == 2) {
          initial_append_log = " [Prevention] : ";
     }
     if(errorType == 3) {
          initial_append_log = " [Error] : ";
     }
     if(errorType == 4) {
          initial_append_log = " [Action] : ";
     }

     log_Message = log_Message + "\r\n" + now.format(date_format) + initial_append_log + errorMessage;
     sessionStorage.setItem("Log", log_Message);
     }

     function Auto_Button() {
        if (flag == 0) {
            document.getElementById("EAutoB").className = "DotG";
            document.getElementById("Auto_Status").innerHTML = "Disable";
            sessionStorage.setItem("AutoAssign", "Enabled");
            flag = 1;
            log(1,"Counselor System Enabled!");
            
        } else {
            document.getElementById("EAutoB").className = "DotR";
            document.getElementById("Auto_Status").innerHTML = "Enable";
            sessionStorage.setItem("AutoAssign", "Disabled");
            flag = 0;
            log(1,"Counselor System Disabled!");
        }
    }

     function log_export() {
          log(4,"Attempting to Export Student Database!");
     }

     function log_delete() {
          log(4,"Attempting to Clear Student Database!");
     }

     $(document).ready(function(){
          var check = sessionStorage.getItem("AutoAssign");
          log_Message = sessionStorage.getItem("Log");
          if (check == "Enabled") {
               flag = 1;
               document.getElementById("Auto_Status").innerHTML = "Disable";
               document.getElementById("EAutoB").className = "DotG";
          } else {
               flag = 0;
               document.getElementById("Auto_Status").innerHTML = "Enable";
               document.getElementById("EAutoB").className = "DotR";
          }
          setInterval(function() {
               if(flag == 1) {
                    $("#div_refresh_Assign").load("../../src/AssignStudToStaff.php");
               }
          }, 1000);
     });

     $(document).ready(function(){
        setInterval(function() {
            if(flag == 1) {
                $("#div_refresh_Assign").load("../../src/clearLocking.php");
                if(sessionStorage.getItem("lock_Message")==1)log(2,"Removing File Lock!");
            }
        }, 5000);
    });

</script>

<body>

    <br>
    <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>
    <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-SignIn.php'">Log Out</button>
    <br><br><br>
    <ul>
        <li><a href="Admin.php">Home</a></li>
        <li><a href="accountManage.php">Account Management</a></li>
        <li><a href="AdminQueue.php">Queue</a></li>
        <li><a href="databaseManage.php">Database Management</a></li>
        <li><a class="active" href="export.php">Database Export</a></li>
        <li style="float:right"><button class="activeButton" onClick = "Auto_Button()">
            <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Counselor System</button>
        </li>
    </ul>

    <span id="div_refresh_Assign" style="display: none;"></span>

    <title>Export student's personal information</title>  
    
    <br /><br />  

          <div class="container" style="width:1500px;">  
               <h2 align="center">Export Student Data to Excel</h2> 
               <br>
               <h4 align="center">*Click "CSV Export" to export database to an excel file*</h4>
               <h4 align="center">*Click "Delete" to delete all data in database*</h4>                
               <br />  

               <!-- Create export and delete button -->
               <form method="post" action="../../src/exportData.php" align="center">  
                    <input type="submit" onClick = "log_export()" name="export" value="CSV Export" class="btn btn-success" />  
               </form>  
               <br>
               <form method="post" action="../../src/deleteData.php" align="center">
                    <input type="submit" onClick = "log_delete()" name="delete" value="Delete" class="btn btn-success" />

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
                    while($row = mysqli_fetch_array($result1))  

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






