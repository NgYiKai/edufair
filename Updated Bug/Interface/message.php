<?php
include('../config/database_connect.php');

//get user msg through ajax
$getMesg = mysqli_real_escape_string($link, $_POST['text']);

//detect emtpy user input
if(empty($getMesg)){
    echo 'Please type something';
    return 0;
}

//detect keyword from user input
if(stripos($getMesg, "fee") !== false){
    $getMesg = str_ireplace('text', 'text', "fee"); //convert input to match keyword in databse
}
if(stripos($getMesg, "hi") !== false || 
   stripos($getMesg, "hey") !== false ||
   stripos($getMesg, "hi there") !== false ||
   stripos($getMesg, "hello") !== false){
    $getMesg = str_ireplace('text', 'text', "hi");
}

//compare user n database query
$check_data = "SELECT replies FROM faq_general WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($link, $check_data) or die("Error");

//if query match, replay is shown otherwise show error statement
if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry cannot understand";
}
?>



