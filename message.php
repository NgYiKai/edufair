<?php
//conect to database
$conn = mysqli_connect("localhost", "Wang", "YES", "education fair") or die("Database Error");

//get user msg through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//detect emtpy user input
if(empty($getMesg)){
    echo 'Please type something';
    return 0;
}

//detect keyword from user input
if(stripos($getMesg, "fee") !== false){
    $getMesg = str_ireplace('text', 'text', "fee"); //convert input to match keyword in database
    
    //Compare user input and database alias
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, " accomodation ") !== false){
    $getMesg = str_ireplace('text', 'text', "accomodation"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "ug duration") !== false){
    $getMesg = str_ireplace('text', 'text', "duration_ug"); 
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "foundation duration") !== false){
    $getMesg = str_ireplace('text', 'text', "duration_foundation"); 
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "exhange") !== false){
    $getMesg = str_ireplace('text', 'text', "exhange_opportunities"); 
    $check_data = "SELECT answer FROM faq_exhange_opportunities WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "facilities") !== false){
    $getMesg = str_ireplace('text', 'text', "facilities"); 
    $check_data = "SELECT answer FROM faq_facilities WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "foundation business tuition fee") !== false){
    $getMesg = str_ireplace('text', 'text', "tuition_fees_foundation_business"); 
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "foundation intake") !== false){
    $getMesg = str_ireplace('text', 'text', "intake_foundation"); 
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "ug intake") !== false){
    $getMesg = str_ireplace('text', 'text', "intake_ug"); 
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "location") !== false){
    $getMesg = str_ireplace('text', 'text', "location"); 
    $check_data = "SELECT answer FROM faq_location WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "scholarship") !== false){
    $getMesg = str_ireplace('text', 'text', "scholarships"); 
    $check_data = "SELECT answer FROM faq_scholarship WHERE alias LIKE '%$getMesg%'";
}

else if(stripos($getMesg, "hi") !== false || 
   stripos($getMesg, "hey") !== false ||
   stripos($getMesg, "hello") !== false){
    $getMesg = str_ireplace('text', 'text', "hi");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg%'";
}

//run sql query
$run_query = mysqli_query($conn, $check_data) or die("Error");

//if query match, replay is shown otherwise show error statement
if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['answer'];
    echo $replay;
}else{
    echo "Sorry cannot understand";
}
?>



