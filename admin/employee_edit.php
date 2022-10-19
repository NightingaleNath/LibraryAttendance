<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$reference_number = $_POST['reference_number'];
		$firstname = $_POST['firstname'];
		$mname = $_POST['mname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$residence_status = $_POST['residence_status'];
		$residence = $_POST['residence'];
		$programme = $_POST['programme'];
		$admission_year = $_POST['admission_year'];
		$level = $_POST['level'];
		
		$sql = "UPDATE students SET reference_number = '$reference_number', firstname = '$firstname', mname = '$mname', lastname = '$lastname', email = '$email', phone = '$phone', residence_status = '$residence_status', residence = '$residence', programme = '$programme', admission_year = '$admission_year', level = '$level' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select Student to edit first';
	}

	header('location: students.php');
?>