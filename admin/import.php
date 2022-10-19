<?php
if (isset($_POST['submit'])) {
	include 'includes/conn.php';
	
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." Uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");

	while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
		$reference_number = $data[0];
		$firstname = $data[1];
		$mname = $data[2];
		$lastname = $data[3];
		$email = $data[4];
		$phone = $data[5];
		$residence_status = $data[6];
		$residence = $data[7];
		$programme = $data[8];
		$admission_year = $data[9];
		$level = $data[10];
		

		$conn->query("INSERT INTO students (reference_number, firstname, mname, lastname, email, phone, residence_status, residence, programme, admission_year, level, created_on) VALUES ('$reference_number', '$firstname', '$mname', '$lastname', '$email', '$phone', '$residence_status', '$residence', '$programme', '$admission_year', '$level', NOW())");
		
		}

	fclose($handle);

	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='employee.php'</script>";
}

?>