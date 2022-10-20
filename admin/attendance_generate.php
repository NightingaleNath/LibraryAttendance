<?php
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
	 	
	 	// 
		$sql = "SELECT *, students.reference_number AS empid, attendance.id AS attid FROM attendance LEFT JOIN students ON students.id=attendance.reference_number WHERE date BETWEEN '$from' AND '$to' GROUP BY attendance.reference_number ORDER BY attendance.date ASC, attendance.time_in ASC";

		$query = $conn->query($sql);
		$total = 0;
		while($row = $query->fetch_assoc()){
			$empid = $row['empid'];
           
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['date'])).'</td>
                <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                <td>'.$row['empid'].'</td>
                <td>'.$row['temperature'].'</td>
                <td>'.$row['tagno'].'</td>
                <td>'.date('h:i A', strtotime($row['time_in'])).'</td>
                <td>'.date('h:i A', strtotime($row['time_out'])).'</td>
				
			</tr>
			';
		}

		return $contents;
	}
		
	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
	$from = date('Y-m-d', strtotime($ex[0]));
	$to = date('Y-m-d', strtotime($ex[1]));

	$from_title = date('M d, Y', strtotime($ex[0]));
	$to_title = date('M d, Y', strtotime($ex[1]));

	require_once('../TCPDF-main/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('UMaT Library Attendance: '.$from_title.' - '.$to_title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">UMaT Library Attendance Sheet</h2>
      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
				  <th width="15%"><b>Date</b></th>
                  <th width="28%"><b>Full Name</b></th>
                  <th width="15%"><b>Students ID</b></th>
                  <th width="10%"><b>Temp</b></th>
                  <th width="8%"><b>Tag</b></th>
                  <th width="12%"><b>Time In</b></th>
                  <th width="12%"><b>Time Out</b></th>
           </tr>  
      ';  
    $content .= generateRow($from, $to, $conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('attendance.pdf', 'I');

?>