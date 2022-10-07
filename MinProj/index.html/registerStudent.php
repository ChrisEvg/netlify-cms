<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>STUDENT DATA CENTER</title>
<link rel="stylesheet" href="StyleSheet.css">
</head>

<body>

<?php

$fname; $lname; $id; $sex; $age; $class; $grade;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fname = test_input($_POST["fname"]); 
$lname = test_input($_POST["lname"]);
$id = test_input($_POST["id"]); 
$sex = test_input($_POST["sex"]); 
$age = test_input($_POST["age"]);
$grade = test_input($_POST["grade"]); 
$class = test_input($_POST["class"]);
  
$user = "root"; 
$servername="localhost"; 
$password = ""; 
$dbname = "zuctdb";
echo "Creating connection...<br><br>";
$conn = new mysqli($servername,$user,$password,$dbname);

if(!$conn) print("Couldn't connect to the server!");

$sql = "INSERT INTO $grade(id,fname,lname,sex,age,class)
VALUES($id,'$fname','$lname','$sex','$age','$class')";

if($conn->query($sql)===FALSE) echo "Couldn't register, please check your inputs and try again";

$conn->close();

header("Location:studentDelete.html");
exit();
?>

<br><br><br><br><br><br><br><br><br><br>


</div>
<button><a href="Manage.php">Return Home</a></button>
</body>
</html>