<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="StyleSheet.css">
</head>

<body>
<button><a href="index.html" >Return Home</a></button>
<br><br>
<?php
$schname; $schcode; $fname; $lname; $qname; $email; $phone; $country; $state;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fname = test_input($_POST["fname"]); 
$lname = test_input($_POST["lname"]);
$phone = test_input($_POST["tel"]); 
$email = test_input($_POST["email"]); 
$qname = test_input($_POST["qname"]);
$schcode = test_input($_POST["code"]); 
$country = test_input($_POST["country"]); 
$state = test_input($_POST["state"]);
$schname = $_POST["name"];

print ("Contacting the server...<br>");
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "$schname$schcode";

$conn = new mysqli($servername, $username,$password);
$sql = "CREATE DATABASE $schname$schcode";
if($conn->query($sql)===TRUE) print ("$schname school has been successfully registered!<br>");
else die("Couldn't register $schname school, verify your inputs and try again!<br>".$conn->error);

$conn->close();

$conn = new mysqli($servername, $username,$password,$dbname);
$sql = "CREATE TABLE schoolHead(
sn INT AUTO_INCREMENT UNIQUE,
phone int(12) NOT NULL primary key,
lname VARCHAR(37) NOT NULL, 
fname VARCHAR(37) NOT NULL,
qual VARCHAR(120) NOT NULL,
email VARCHAR(59) NOT NULL,
state VARCHAR(39) NOT NULL,
country VARCHAR(39) NOT NULL,
reg_date timestamp default current_timestamp on update current_timestamp
)
";

if($conn->query($sql)===TRUE) echo "Table was created.<br>";

$sql = "INSERT INTO schoolHead(phone,lname,fname,qual,email)
VALUES($phone,'$lname','$fname','$qname','$email','$state','$country')";

if($conn->query($sql)===TRUE) echo "Record was stored.<br>";

$conn->close();

header("Location:CreateRegister.html");
exit();

?>

</body>
</html>