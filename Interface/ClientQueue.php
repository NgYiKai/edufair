<?php
  session_start();
  include('../config/database_connect.php');  
  $StudentID=$_SESSION['Student_ID'];
  //Retreive Data Base on the Student_ID
  $Query="SELECT * FROM student_personal_info WHERE Student_ID=$StudentID";
  $query = $link->prepare($Query); // prepate a query
  $query->execute(); // actually perform the query
  $result = $query->get_result(); // retrieve the result so it can be used inside PHP
  $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
  //Storing Data From Personal_Info into variable
  $First_Name = $r['First_Name'];
  $Last_Name  = $r['Last_Name'];
  date_default_timezone_set("Asia/Kuala_Lumpur");
  $CurrentTime=date("Y-m-d H:i:s");

  $loop = "UPDATE `queue` SET `session` = '$CurrentTime' WHERE `queue`.`Student_ID` = $StudentID";
  mysqli_query($link, $loop);

?>

<!DOCTYPE html>
<html>
  <link rel="stylesheet" type="text/css" href="../design/random.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
      var StudentID = <?php echo $_SESSION['Student_ID']?>;
      function DisplayQueueNumber() {
        $.post('ShowQueueNumber.php',{postStudID:StudentID},
        function(data){
          $('#span_QueueNumUpdate').html(data);
        });
      }
      function UpdateTimeStamp() {
        $("#div_refresh").load("UpdateTimeStamp.php");
      }

      $(document).ready(function(){
      UpdateTimeStamp();
      DisplayQueueNumber();
          setInterval(function() {
              UpdateTimeStamp();
              DisplayQueueNumber();
          }, 1000);
      });
  
  </script>
  <head>

    <meta charset="UTF-8">
    <title>Queuing</title>

    <h1> Counselor Queue</h1>
    <div id="div_refresh"></div>

  </head>
  <body>

    <div class  = "welcome">

      Dear <?php echo $Last_Name;?> <?php echo $First_Name; ?>,<br>

      <p style="margin-left:2.5em">Your Queue Number is 
      <span id="span_QueueNumUpdate"></span> </p>
      
    </div>

  </body>
</html>