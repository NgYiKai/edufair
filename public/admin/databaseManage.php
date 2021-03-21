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
	include('../../src/databaseManage.php'); 


?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../design/AdminStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>

    var flag;
    function Auto_Button() {
        if (flag == 0) {
            document.getElementById("EAutoB").className = "DotG";
            document.getElementById("Auto_Status").innerHTML = "Disable";
            sessionStorage.setItem("AutoAssign", "Enabled");
            flag = 1;
        } else {
            document.getElementById("EAutoB").className = "DotR";
            document.getElementById("Auto_Status").innerHTML = "Enable";
            sessionStorage.setItem("AutoAssign", "Disabled");
            flag = 0;
        }

    }

    $(document).ready(function(){
    var check = sessionStorage.getItem("AutoAssign");
    if (check == "Enabled") {
        flag = 1;
        document.getElementById("Auto_Status").innerHTML = "Disable";
        document.getElementById("EAutoB").className = "DotG";
    } else {
        flag = 0;
        document.getElementById("Auto_Status").innerHTML = "Enable";
        document.getElementById("EAutoB").className = "DotR";
    }
    console.log(flag);
        setInterval(function() {
            if(flag == 1) {
                $("#div_refresh_Assign").load("AssignStudToStaff.php");
            }
        }, 1000);
    });

</script>
<body>
    <span id="div_refresh_Assign" style="display: none;"></span>
    <br>
    <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>
    <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-SignIn.php'">Log Out</button>
    <!-- <button class="activeButton" style="float: right" onClick = "Auto_Button()">
        <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Auto Assign
    </button> -->

    <br><br><br>

    <ul>
        <li><a class="active" href="Admin.php">Home</a></li>
        <li><a href="accountManage.php">Account Management</a></li>
        <li><a href="AdminQueue.php">Queue</a></li>
        <li><a href="databaseManage.php">Database Management</a></li>
        <li style="float:right"><button class="activeButton" onClick = "Auto_Button()">
            <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Counselor System
        </button></li>
    </ul>

    <br><br><br><br><br>

    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM $table"); ?>

<form >
  <label >Choose a table:</label>
  <select name="tableSelected" >
    <option value="faq_facilities">Facilities</option>
    <option value="faq_fees">Fees</option>
	<option value="faq_accomodation">Accomodation</option>
	<option value="faq_duration_of_programme">Duration of the programme</option>
	<option value="faq_general">General</option>
	<option value="faq_intake">Intake</option>
  </select>
  <br><br>
  <input type="submit" name="tableSubmit">
</form>

<br><br>

<form method="post" action="../../src/databaseManage.php" >
    <input type="hidden" name="no" value="<?php echo $no; ?>">
	<input type="hidden" name="table" value="<?php echo $table; ?>">
		<div class="input-group">
			<label>Question </label>
			<input type="text" name="question" value="<?php echo $question; ?>">
		</div>
		<br>
		<div class="input-group">
			<label>Answer</label>
			<input type="text" name="answer" value="<?php echo $answer; ?>">
		</div>
		<div class="input-group">
        <?php if ($update == true): ?>
	        <button class="btn" type="submit" name="update" >update</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php endif ?>
		</div>
</form>

<br><br>

<table>
	<thead>
		<tr>
			<th>Question</th>
			<th>Answer</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['question']; ?></td>
			<td><?php echo $row['answer']; ?></td>
			<td>
				<a href="databaseManage.php?edit=<?php echo $row['no']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="databaseManage.php?del=<?php echo $row['no']; ?>&table=<?php echo $table; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<br><br><br><br>



<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>


</body>
</html>