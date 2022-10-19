<?php
	if(isset($_POST['reference'])){
		$output = array('error'=>false);

		include 'conn.php';
		include 'timezone.php';

		$reference = $_POST['reference'];
		$temperature = $_POST['temperature'];
		$tagno = $_POST['tagno'];
		$status = $_POST['status'];
		$logstatus = 0;

		$sql = "SELECT * FROM students WHERE reference_number = '$reference'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['id'];

			$date_now = date('Y-m-d');

			if($status === 'in'){
				$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN students ON students.id=attendance.reference_number WHERE attendance.reference_number = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$sql = "UPDATE attendance SET temperature = '$temperature', tagno = '$tagno', time_in = NOW(), status = '$logstatus' WHERE reference_number = '$id'";
					if($conn->query($sql)){
						$output['message'] = 'Checked In By: <br>'.$row['firstname'].' '.$row['lastname'].'<br>'.$row['reference_number'].'<br>'.$row['programme'];
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
				else{
					
					//
					$sql = "INSERT INTO attendance (reference_number, temperature, tagno, date, time_in, status) VALUES ('$id', '$temperature', '$tagno', '$date_now', NOW(), '$logstatus')";
					if($conn->query($sql)){
						$output['message'] = 'Checked In By: <br>'.$row['firstname'].' '.$row['lastname'].'<br>'.$row['reference_number'].'<br>'.$row['programme'];
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
			}
			
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Reference Number not found';
		}
		
	}
	
	echo json_encode($output);
	//header('location: checkin.php');

?>