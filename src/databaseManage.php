<?php 
	$db = mysqli_connect('localhost', 'root', '', 'education fair');

	// initialize variables
	$question = "";
	$answer = "";
	$no = 0;
	$update = false;

	if (isset($_GET['tableSubmit'])) {
		$table= $_GET['tableSelected'];
		$_SESSION['table'] = $table;
	}

	if (isset($_SESSION['table'])){
		$table= $_SESSION['table'];
	}else{
		$table="faq_facilities";
	}

	if (isset($_GET['edit'])) {
		$no = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM $table WHERE no=$no");


		if ($record && mysqli_num_rows( $record )==1) {
			$n = mysqli_fetch_array($record);
			$question = $n['question'];
			$answer = $n['answer'];
		}
	}

	if (isset($_POST['save'])) {
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$table=$_POST['table'];

		mysqli_query($db, "INSERT INTO $table (question, answer) VALUES ('$question', '$answer')"); 
		$_SESSION['message'] = "Data saved"; 
		header('location: ../public/admin/databaseManage.php');
	}

    if (isset($_POST['update'])) {
        $no = $_POST['no'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$table=$_POST['table'];
    
        mysqli_query($db, "UPDATE $table SET question='$question', answer='$answer' WHERE no=$no");
        $_SESSION['message'] = "Data updated!"; 
        header('location: ../public/admin/databaseManage.php');
    }

	if (isset($_GET['del'])) {
		$no = $_GET['del'];
		$table=$_GET['table'];
		mysqli_query($db, "DELETE FROM $table WHERE no=$no");
		$_SESSION['message'] = "Data deleted!"; 
		header('location: ../admin/databaseManage.php');
	}


?>


