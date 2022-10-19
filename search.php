<?php
include 'conn.php';
if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM students WHERE reference_number LIKE '{$_GET['term']}%' LIMIT 10";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['reference_number'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>