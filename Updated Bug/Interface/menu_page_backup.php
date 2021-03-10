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
?>
<!DOCTYPE html>
<html>

  <?php
  echo '<link rel="stylesheet" href="../design/random.css">';
  ?>
  
  <head>

    <meta charset="UTF-8">
    <title>Display Input</title>

    <h1>How can we assist you ?</h1>

  </head>

  <body>

  <div class  = "welcome_word">

  Welcome <?php echo $Last_Name;?> <?php echo $First_Name; ?><br>
  <img src="../media/big_ben.jpg" alt="Nottingham Campus" class="big_ben">
  University of Nottingham Malaysia Booth <br><br>

  </div>

  <div class = "menu_button">
    <button type="button" class = "button button_ask" onclick = "window.location.href='chatbot.php'">Chat with us </button>
    <a href="../Database_Insert_Script/Insert_Queue.php"><button type="button" class = "button">See a counsellor </button> </a>
    <button type="button" class = "button button_visit" target="_blank" onclick = "window.open('https://www.nottingham.edu.my/index.aspx','_blank')" >Visit Official Website </button>
  </div>
  </body>
</html>