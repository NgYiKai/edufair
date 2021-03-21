<?php  
       
if(isset($_POST["export"]))  
{  
     include('../config/database_connect.php');

     header('Content-Type: text/csv; charset=utf-8');  
     header('Content-Disposition: attachment; filename=data.csv');  

     $output = fopen("php://output", "w");  

     fputcsv($output, array('Student_ID', 'First_Name', 'Last_Name', 'Phone_Number', 'Email', 'PreviousSchool', 'HighestQualification', 'MarketingPreference', 'Privacy', 'Remark'));  

     $query = "SELECT student_personal_info.Student_ID, student_personal_info.First_Name, student_personal_info.Last_Name, student_contact_info.Phone_Number, student_contact_info.Email, student_additional_info.PreviousSchool, student_additional_info.HighestQualification, student_additional_info.MarketingPreference, student_additional_info.Privacy, student_remark.Remark
               FROM student_personal_info
               INNER JOIN student_contact_info
               ON student_personal_info.Student_ID = student_contact_info.Student_ID
               INNER JOIN student_additional_info
               ON student_personal_info.Student_ID = student_additional_info.Student_ID
               INNER JOIN student_remark
               ON student_personal_info.Student_ID = student_remark.Student_ID";  

     $result = mysqli_query($link, $query);  
     
     while($row = mysqli_fetch_assoc($result))  
     {  
          fputcsv($output, $row);  
     }  
     fclose($output);  
}  
?>  
