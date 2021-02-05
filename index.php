<?php
   $conn = mysqli_connect('localhost','yk','abc123','education fair');

   if(!$conn){
       echo 'Connection error:' .mysqli_connect_error();
   }
?>

<!DOCTYPE html>
<html >
<head>  
    <title>Edu</title>
</head>

<body>
   <section>
       <form>
           <label>Your name:</label>
           <input type="text" name="email">   
           <br>
           <label>Your name:</label>
           <input type="text" name="email">   
           <br>
           <label>Your name:</label>
           
           <input type="text" name="email">   
           <br>
           <input type="submit" name="submit" value="submit" >
       </form>
   </section>
   


</body>
</html> 