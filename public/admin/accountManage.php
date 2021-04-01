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
	include('../../src/accountManage.php'); 
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

    function log_update() {
        log(4,"Attempting to update " + document.getElementById('TypeBox').value + " Account");
    }

    function log_save() {
        log(4,"Attempting to create new " + document.getElementById('TypeBox').value + " Account");
    }

    function log_A_edit() {
        log(4,"Attempting to edit Admin Account");
    }

    function log_A_delete() {
        log(4,"Attempting to delete Admin Account");
    }

    function log_C_edit() {
        log(4,"Attempting to edit Counselor Account");
    }

    function log_C_delete() {
        log(4,"Attempting to delete Counselor Account");
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

    function changeDiv() {
        if(document.getElementById('TypeBox').value == "Admin") {
            document.getElementById('DBox').style.display = "none";
        } else {
            document.getElementById('DBox').style.display = "block";
        }
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
        if(document.getElementById('TypeBox').value == "Admin") {
            document.getElementById('DBox').style.display = "none";
        } else {
            document.getElementById('DBox').style.display = "block";
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
        <li><a class="active" href="accountManage.php">Account Management</a></li>
        <li><a href="AdminQueue.php">Queue</a></li>
        <li><a href="databaseManage.php">Database Management</a></li>
        <li><a href="export.php">Database Export</a></li>

        <li style="float:right"><button class="activeButton" onClick = "Auto_Button()">
            <span id = "EAutoB" class = "DotR">&#x25cf</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="Auto_Status">Enable</span> Counselor System
        </button></li>
    </ul>

    <?php 
        $aresults = mysqli_query($link, "SELECT * FROM staff WHERE Type = 'Admin' ORDER BY Staff_ID ASC");
        $cresults = mysqli_query($link, "SELECT * FROM staff WHERE Type = 'Counselor' ORDER BY Staff_ID ASC");

    ?>




<br><br>

<form method="post" action="../../src/accountManage.php" >
    <input type="hidden" name="no" value="<?php echo $no; ?>">
        <div class="input-group">
			<label>Type </label> <br>
            <select id="TypeBox" name="type" onchange="changeDiv()">
                <option value="<?php echo empty($type) ? "Admin" : $type ?>"><?php echo empty($type) ? "Admin" : $type ?></option>
                <!-- <option value="Admin">Admin</option> -->
                <option value="Counselor">Counselor</option>
            </select>
		</div>
		<br>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo $fname; ?>" required>
		</div>  
        <br>  
        <div class="input-group">
			<label>Last Name </label>
			<input type="text" name="lname" value="<?php echo $lname; ?>" >
		</div>
		<br>
		<div class="input-group">
			<label>Username </label>
			<input type="text" name="username" value="<?php echo $username; ?>" required>
		</div>
        <br>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="password" value="<?php echo $password; ?>" required>
		</div>
		<br>
		<div id = "DBox" class="input-group">
			<label>Display Name</label>
			<input type="text" name="dname" value="<?php echo $dname; ?>" <?php echo $type == "Counselor" ? "required" : "" ?>>
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

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Admin Account</center></b></h6>
<table>
	<thead>
		<tr>
            <th>Type</th>   
			<th>First Name</th>
            <th>Last Name</th>   
			<th>Username</th>
			<th>Password</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($arow = mysqli_fetch_array($aresults)) { ?>
		<tr>
            <td><?php echo $arow['Type']; ?></td>
			<td><?php echo $arow['First_Name']; ?></td>
            <td><?php echo $arow['Last_Name']; ?></td>
			<td><?php echo $arow['Username']; ?></td>
			<td><?php echo $arow['Password']; ?></td>
			<td>
				<a onClick = "log_A_edit()" href="accountManage.php?edit=<?php echo $arow['Staff_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a onClick = "log_A_delete()" href="accountManage.php?del=<?php echo $arow['Staff_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<br><br>

<h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Counselor Account</center></b></h6>
<table>
	<thead>
		<tr>
            <th>Type</th>   
			<th>First Name</th>
            <th>Last Name</th>   
			<th>Username</th>
			<th>Password</th>
            <th>Display Name</th>   
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($crow = mysqli_fetch_array($cresults)) { ?>
		<tr>
            <td><?php echo $crow['Type']; ?></td>
			<td><?php echo $crow['First_Name']; ?></td>
            <td><?php echo $crow['Last_Name']; ?></td>
			<td><?php echo $crow['Username']; ?></td>
			<td><?php echo $crow['Password']; ?></td>
            <td><?php echo $crow['Display_Name']; ?></td>
			<td>
				<a onClick="log_C_edit()" href="accountManage.php?edit=<?php echo $crow['Staff_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a onClick="log_C_delete()" href="accountManage.php?del=<?php echo $crow['Staff_ID']; ?>" class="del_btn">Delete</a>

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