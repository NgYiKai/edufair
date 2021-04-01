<?php 
	$Database_Name = "education fair";
    $link = mysqli_connect("localhost", "root", "", $Database_Name);

	// initialize variables
	$type = "";
	$fname = "";
	$lname = "";
	$username = "";
	$password = "";
	$dname = "";

	$no = 0;
	$update = false;

	if (isset($_GET['edit'])) {
		$no = $_GET['edit'];
		$update = true;
		$record = mysqli_query($link, "SELECT * FROM staff WHERE Staff_ID=$no");

		if ($record) {
			$n = mysqli_fetch_array($record);
			$type = $n['Type'];
			$fname = $n['First_Name'];
			$lname = $n['Last_Name'];
			$username = $n['Username'];
			$password = $n['Password'];
			$dname = $n['Display_Name'];

		}
	}

	if (isset($_POST['save'])) {
		//Auto increment for student ID
		$POSTCount      =   1;
		$check = mysqli_query($link, "SELECT Staff_ID FROM staff ORDER BY Staff_ID DESC LIMIT 1");
		$iquery         =   $link   ->  prepare( "SELECT Staff_ID FROM staff ORDER BY Staff_ID DESC LIMIT 1" ); // prepate a query
		$iquery         ->  execute(); // actually perform the query
		$iresult        =   $iquery  ->  get_result(); // retrieve the result so it can be used inside PHP
		$ir             =   $iresult ->  fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
		$CurrentCount   =   $ir['Staff_ID'];
		if(!is_null($CurrentCount)) { $POSTCount=$CurrentCount+1; }

		$type = $_POST['type'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$dname = $_POST['dname'];

		$check = mysqli_query($link, "SELECT * FROM staff where Username = '$username' AND Type = '$type'");
		
		if ($check && !mysqli_num_rows( $check )>0) {
			mysqli_query($link, "INSERT INTO staff (Staff_ID,Type,First_Name,Last_Name,Username, Password, Display_Name) VALUES ('$POSTCount','$type','$fname','$lname','$username', '$password','$dname')"); 
			$_SESSION['message'] = "Data saved"; 
			header('location: ../public/admin/accountManage.php');
		} else {
			$_SESSION['message'] = "Data exists"; 
			header('location: ../public/admin/accountManage.php');
		}

	}

    if (isset($_POST['update'])) {
        $no = $_POST['no'];
		$type = $_POST['type'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$dname = $_POST['dname'];
    
        mysqli_query($link, "UPDATE staff SET Type='$type',First_Name='$fname',Last_Name='$lname',Username='$username', Password='$password', Display_Name='$dname' WHERE Staff_ID=$no");
        $_SESSION['message'] = "Data updated!"; 
		header('location: ../public/admin/accountManage.php');
    }

	if (isset($_GET['del'])) {
		$no = $_GET['del'];
		mysqli_query($link, "DELETE FROM staff WHERE Staff_ID=$no");
		$_SESSION['message'] = "Data deleted!"; 
		header('location: ../admin/accountManage.php');

	}

?>