<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete student</title>
<link rel="stylesheet" href="StyleSheet.css">
</head>

<body>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$grade = $_POST["grade"]; 
$id2 = test_input($_POST["id2"]);


$user = "root"; 
$servername="localhost"; 
$password = ""; 
$dbname = "zuctdb";
echo "Creating connection...<br>";
$conn = new mysqli($servername,$user,$password,$dbname);

if(!$conn) print("Couldn't connect to the server!");

$sql = "DELETE FROM $grade WHERE id='$id2'";
if($conn->query($sql)) print("Recorded deleted!<br><br><br>");
else echo $conn->connect_error."Operation was unsuccessful!";

header("Location:studentDelete.html");
exit();
?>
<br>



</body>
</html>