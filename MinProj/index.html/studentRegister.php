<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CREATING DB AND TABLES</title>
</head>

<body>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$uname = test_input($_POST["uname"]);
$fname = test_input($_POST["firstname"]); 
$lname = test_input($_POST["lastname"]);
$tcz = test_input($_POST["tcz"]); 
$email = test_input($_POST["email"]); 
$nrc = test_input($_POST["nrc"]);
$schcode = test_input($_POST["schoolcode"]); 
$class = test_input($_POST["class"]); 
$pword = $_POST["password"];
$sex = $_POST["sex"];
$schname = test_input($_POST["sname"]);
$encrypted_pwd = md5($pword);

print ("Contacting the server...<br>");
$username = "root";
$password = "";
$servername = "localhost";

$conn = new mysqli($servername, $username,$password);
$sql = "CREATE DATABASE [IF NOT EXISTS] zuctdb";
if($conn->query($sql)===TRUE) print ("zuctdb has been successfully registered!<br>");
else die("Couldn't register zuctdb, verify your inputs and try again!<br>".$conn->error);
$dbname= "zuctdb";
$conn->close();
$conn = new mysqli($servername, $username,$password,$dbname);

if($conn) echo "Connected succesfully!";

$sql = "CREATE TABLE [IF NOT EXISTS] $class(
sn INT AUTO_INCREMENT UNIQUE,
id int(8) not null primary key, 
class char(6) not null, 
fname varchar(29) not null,
lname varchar(29) not null, 
age int(2), 
sex char(6) not null,
mark CHAR(1),
reg_date timestamp default current_timestamp on update current_timestamp
)";

$sql = "CREATE TABLE [IF NOT EXISTS]teacher(
sn INT AUTO_INCREMENT UNIQUE,
id VARCHAR(21) NOT NULL primary key,
phone int(12),
lname VARCHAR(37) NOT NULL, 
fname VARCHAR(37) NOT NULL,
qual VARCHAR(120) NOT NULL,
email VARCHAR(59) NOT NULL,
state VARCHAR(39) NOT NULL,
country VARCHAR(39) NOT NULL,
reg_date timestamp default current_timestamp on update current_timestamp
)
";

if($conn->query($sql)===TRUE) print("Tables were created successfully!<br>");
else echo("Couldn't create Tables".$conn->connect_error);

$sql = "INSERT INTO teacher(schcode,fname,lname,sex,nrc,pasword,email)
VALUES('$schcode','$fname','$lname','$sex','$nrc','$pword','$email')";

header("Location:registerStudent.html");
exit();
?>
</body>
</html>