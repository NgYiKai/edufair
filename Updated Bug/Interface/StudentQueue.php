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
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
      var StudentID = <?php echo $_SESSION['Student_ID']?>;
      function DisplayQueueNumber() {
        $.post('ShowQueueNumber.php',{postStudID:StudentID},
        function(data){
          $('#span_QueueNumUpdate').html(data);
          // document.getElementById("span_QueueNumUpdate").innerHTML = data;
        });
      }
      function UpdateTimeStamp() {
        $("#div_refresh").load("UpdateTimeStamp.php");

      } 

      var lock = 'FALSE';
      var E = "Empty";
      var Sta_FN= E;
      var Sta_LN= E;
      var Sta_D_N= E;
      var assignStaffID = "NULL";

      function RetrieveStaffInfo() {
        $.post('GetAssignStaff.php',{postStudID:StudentID},
        function(data){
            if(data!="Fail") {
                var array = data.split(' ; ');
                Sta_FN = array[0];
                Sta_LN = array[1];
                Sta_D_N = array[2];
                assignStaffID = array[3]; }
        });
      }

      $(document).ready(function(){
      UpdateTimeStamp();
      DisplayQueueNumber();
          setInterval(function() {
              console.log(lock);
            if(assignStaffID == "NULL" && lock == 'FALSE') {
              UpdateTimeStamp();
              DisplayQueueNumber();
            } else {
              lock = 'TRUE';
              document.getElementById("AssignMSG1").innerHTML =  "You have been assigned to " + Sta_LN + " " + Sta_FN + ".";
              document.getElementById("AssignMSG2").innerHTML =  "Please proceed to " + Sta_D_N + ".";
              document.getElementById("QueueNumberTitle").style.display = "none";
              document.getElementById("QueueBox").style.display = "none";
              document.getElementById("QueueText").style.display = "none";
              document.getElementById("AssignText").style.display = "block";
            }
            RetrieveStaffInfo();
          }, 1000);
      });
  
  </script>


  <head>
    <meta charset="UTF-8">
  
              
    <!-------- link for CSS   --------->
    <link rel="stylesheet" href="main.css">
  
  
    <!-------- link for FOOTER   --------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
    <title>Queuing</title>
  
    <div id="div_refresh"></div>
    <div id="div_clearAssign" style="display: none;"></div>

  
  
    <!--- logo --->
    <div 
          class="logo">
    </div>

  </head>

  <body id = queue>

    <div id="QueueNumberTitle" class = "container-fliud">
      <p  class = "queue_text" >Your Queue Number Is:</p>
    </div>

    <div id="QueueBox" class = "box">
      <p id="span_QueueNumUpdate"></p>
    </div>

    <div id = "QueueText" class = "container-fluid">
      <p class = "queue_text"> Thank You For Your Patience, <br> A Counsellor Will Be With You Shortly. </p>
    </div>

    <div id="AssignText" style="display: none;" class = "container-fluid">
      <br><br><br>
      <p id = "AssignMSG1" class = "queue_text"></p>
      <p id = "AssignMSG2" class = "queue_text"></p>
      <br>
    </div>
              
              
              
  <!---- Start Footer ------>
        
    <div class="footer-clean">
          <footer>
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-sm-4 col-md-3 item">
                          <h7>Address </h7>
                          <p class="lead mb-0">
                              University of Nottingham Malaysia <br>
                              Jalan Broga, 43500 Semenyih <br>
                              Selangor Darul Ehsan <br>
                              Malaysia <br>
                          </p>
                        
                      </div>
                      <div class="col-sm-4 col-md-3 item">
                          <h7>About</h7>
                          <ul>
                              <li class="lead mb-0"><a href="https://www.nottingham.edu.my/index.aspx">Visit Our Official Website <br><br></a></li>
                          </ul>
                      </div>
                      <div class="col-sm-4 col-md-3 item">
                          <h7>Contact Us</h7>
                          <p class="lead mb-0">
                              telephone: +6 (03) 8924 8000 <br>
                              fax: +6 (03) 8924 8001 <br> 
                          </p>
                      </div>
                      <div class="col-lg-3 item social">
                          <a href="https://www.facebook.com/UoNMalaysia"><i class="icon ion-social-facebook"></i>
                          </a>
                          <a href="https://twitter.com/UoNMalaysia"><i class="icon ion-social-twitter"></i>
                          </a>
                          <a href="#"><i class="icon ion-social-youtube"></i>
                          </a>
                          <ul>
                              <li class="copyright"><a href="https://www.nottingham.edu.my/Utilities/Copyright.aspx">Copyright  </a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer>
      </div>
        
        
  <!---- End Footer ------>
          
          
              
              
              
  <!--- 
        
  javascript for footer 

  --->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js">
  </script>
      
      
  </body>
</html>