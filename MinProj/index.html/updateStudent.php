<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$servername = "local";
$username = "root";
$password = "";
$dbname = "zuctdb";
$grade = $_POST["grade"];
$id = $_POST["id3"];

$conn = new mysqli($servername,$username,$password,$dbname);

if(!$conn) echo "Unable to fetch server";

$sql = "ALTER TABLE $grade SET att = 'X' where id = $id";

if($conn->query($sql) === TRUE) echo "Resgister amrked <br>";
else print("Unallocated student!");
 

header("Location:registerStudent.html");
exit();


?>
</body>
</html>