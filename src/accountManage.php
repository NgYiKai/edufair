<?php 
	$db = mysqli_connect('localhost', 'root', '', 'education fair');

	// initialize variables
	$username = "";
	$password = "";
	$no = 0;
	$update = false;

	if (isset($_GET['edit'])) {
		$no = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM staff WHERE Staff_ID=$no");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$username = $n['Username'];
			$password = $n['Password'];
		}
	}

	if (isset($_POST['save'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		mysqli_query($db, "INSERT INTO staff (Username, Password) VALUES ('$username', '$password')"); 
		$_SESSION['message'] = "Data saved"; 
		header('location: ../public/admin/accountManage.php');
	}

    if (isset($_POST['update'])) {
        $no = $_POST['no'];
		$username = $_POST['username'];
		$password = $_POST['password'];
    
        mysqli_query($db, "UPDATE staff SET Username='$username', Password='$password' WHERE Staff_ID=$no");
        $_SESSION['message'] = "Data updated!"; 
        header('location: ../public/admin/accountManage.php');
    }

	if (isset($_GET['del'])) {
		$no = $_GET['del'];
		mysqli_query($db, "DELETE FROM staff WHERE Staff_ID=$no");
		$_SESSION['message'] = "Data deleted!"; 
		header('location: ../public/admin/accountManage.php');
	}

?>