<?php
	if(isset($_POST['reference'])){
		$output = array('error'=>false);

		include 'conn.php';
		include 'timezone.php';

		$reference = $_POST['reference'];
		$status = $_POST['status'];

		$sql = "SELECT * FROM students WHERE reference_number = '$reference'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['id'];

			$date_now = date('Y-m-d');
			$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN students ON students.id=attendance.reference_number WHERE attendance.reference_number = '$id' AND date = '$date_now'";
			$query = $conn->query($sql);
			if($query->num_rows < 1){
			    $output['error'] = true;
			    $output['message'] = 'Cannot Check Out. <br>No time in.';
			}
			else {
				$row = $query->fetch_assoc();			
				$sql = "UPDATE attendance SET time_out = NOW(), status = 1 WHERE id = '".$row['uid']."'";
				if($conn->query($sql)) {
					$output['message'] = 'Checked Out By: <br>'.$row['firstname'].' '.$row['lastname'].'<br>'.$row['reference_number'].'<br>'.$row['programme'];

					$sql = "SELECT * FROM attendance WHERE id = '".$row['uid']."'";
					$query = $conn->query($sql);
					$urow = $query->fetch_assoc();

					$time_in = $urow['time_in'];
					$time_out = $urow['time_out'];

					$time_in = new DateTime($time_in);
					$time_out = new DateTime($time_out);
					$interval = $time_in->diff($time_out);
					$hrs = $interval->format('%h');
					$mins = $interval->format('%i');
					$mins = $mins/60;
					$int = $hrs + $mins;
					if($int > 4){
					  $int = $int - 1;
					}

					$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
					$conn->query($sql);
				}
				else{
				$output['error'] = true;
				$output['message'] = $conn->error;
				}
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Reference Number not found';
		}
		
	}
	
	echo json_encode($output);

?>