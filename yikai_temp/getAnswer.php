
<!DOCTYPE html>
<html>
<head>  
    <title>Select</title>
</head>

<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','yk','abc123','education fair');
if(!$con){
    echo 'Connection error:' .mysqli_connect_error();
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM `question` WHERE alias LIKE '%tuition_fees_foundation_arts%'";
$result = mysqli_query($con,$sql);

$answer=mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r($answer['0']['answer']);
mysqli_close($con);
?>
</body>
</html> 