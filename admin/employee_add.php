<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
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

		//Insertion query
		$sql = "INSERT INTO students (reference_number, firstname, mname, lastname, email, phone, residence_status, residence, programme, admission_year, level, created_on) VALUES ('$reference_number', '$firstname', '$mname', '$lastname', '$email', '$phone', '$residence_status', '$residence', '$programme', '$admission_year', '$level', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: students.php');
?>