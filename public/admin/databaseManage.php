<?php  
    session_start();
	include('../../config/database_connect.php');
	if($_SESSION['Staff_ID'] != NULL) {
	  $StaffID=$_SESSION['Staff_ID'];
	} else {
	  header('Location:Staff-SignIn.php');
	}
    error_reporting(E_ALL ^ E_WARNING); 

  
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
<script src="https://momentjs.com/downloads/moment.js"></script>
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

    function log_update() {
        log(4,"Attempting to Update [<?php echo $_SESSION['table']?>]FAQ Database!");
    }

    function log_save() {
        log(4,"Attempting to Insert New Data Into [<?php echo $_SESSION['table']?>]FAQ Database!");
    }

    function log_edit() {
        log(4,"Attempting to Edit [<?php echo $_SESSION['table']?>]FAQ Database!");
    }

    function log_delete() {
        log(4,"Attempting to Delete Data from [<?php echo $_SESSION['table']?>]FAQ Database!");
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
    <span id="div_refresh_Assign" style="display: none;"></span>
    <br>
    <button class="Staff-Name" style="float: left"><?php echo "$Staff_Last_Name $Staff_First_Name"?></button>
    <button class="LogOut" style="float: left" onclick = "window.location.href='Staff-SignIn.php'">Log Out</button>
    <!-- <button class="activeButton" style="float: right" onClick = "Auto_Button()">
        <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Auto Assign
    </button> -->

    <br><br><br>

    <ul>

        <li><a href="Admin.php">Home</a></li>
        <li><a href="accountManage.php">Account Management</a></li>
        <li><a href="AdminQueue.php">Queue</a></li>
        <li><a class="active" href="databaseManage.php">Database Management</a></li>
        <li><a href="export.php">Database Export</a></li>

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

  <select name="tableSelected">
    <option <?php if($_SESSION['table'] == 'faq_facilities'){echo("selected");}?> value="faq_facilities">Facilities</option>
    <option <?php if($_SESSION['table'] == 'faq_fees'){echo("selected");}?> value="faq_fees">Fees</option>
	<option <?php if($_SESSION['table'] == 'faq_accomodation'){echo("selected");}?> value="faq_accomodation">Accomodation</option>
	<option <?php if($_SESSION['table'] == 'faq_duration_of_programme'){echo("selected");}?> value="faq_duration_of_programme">Duration of the programme</option>
	<option <?php if($_SESSION['table'] == 'faq_general'){echo("selected");}?> value="faq_general">General</option>
	<option <?php if($_SESSION['table'] == 'faq_intake'){echo("selected");}?> value="faq_intake">Intake</option>

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
	        <button onClick = "log_update()" class="btn" type="submit" name="update" >update</button>
        <?php else: ?>
            <button onClick = "log_save()" class="btn" type="submit" name="save" >Save</button>

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
				<a onClick="log_edit()" href="databaseManage.php?edit=<?php echo $row['no']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a onClick="log_delete()" href="databaseManage.php?del=<?php echo $row['no']; ?>&table=<?php echo $table; ?>" class="del_btn">Delete</a>
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