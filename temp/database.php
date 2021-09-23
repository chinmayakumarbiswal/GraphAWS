<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skill";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM sen1 WHERE id='2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $arr = array (
        'name' => $row['name'],
        'data' => array_map('intval', explode(',',$row['data']))
    );
    $series_array[] = $arr;
  }
  echo json_encode ($series_array);
} else {
  echo "0 results";
}


$conn->close();
?>