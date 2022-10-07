<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER MANAGEMENT</title>
</head>

<body>
<button><a href="index.html" >Return Home</a></button>
<br><br>

<?PHP

$grade = $_POST["grade"];
$user = "root"; 
$servername="localhost"; 
$password = ""; 
$dbname = "zuctdb";

$conn = new mysqli($servername,$user,$password,$dbname);

if($conn) echo "Connected successfully!<br>";
else die($conn->error);


$sql = "SELECT * FROM $grade";
$result = $conn->query($sql);
echo "Server returned:<br> ";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " Name: " . $row["fname"]. " " . $row["lname"]. 
        " Class: ". $row["class"]. " Age: ". $row["age"]. " "."Present: ".$row["mark"];
    }
} else {
    echo "0 results";
}



if($conn->query($sql)) print("Data was recorded successfully!<br>");
else echo("Couldn't create Table $class".$conn->connect_error);


$conn->close();

header("Location:registerStudent.html");
exit();
?>

</body>
</html>