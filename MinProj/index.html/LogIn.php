<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MANAGEMENT CENTER</title>
</head>

<body>

<?PHP
 $pswd = $_POST["pswd"];
 $encrypted_pwd = md5($pswd);
 $uname = $_POST["uname"]; 
 $schname = $_POST["sname"];
 $schcode =$_POST["code"];
 $dbname = "$schname$schcode";
 $username = "root";
 $pasword = "";
 $servername = "localhost";
 
 $conn = new mysqli($servername,$username,$pasword,$dbname);
 
 if($conn) echo "Waiting for server...";
 else print("Could not reach the server! Check your inputs and try again $conn->error");
 
 
 $sql = "SELECT pasword FROM $uname WHERE pasword = '$pswd' ";
 
 if($conn->query($sql)===TRUE)
 {print ("Pass!");
 
header("Location:registerStudent.html");
exit();

 }
 else {
 print("Wrong passcode!<br>");
 
 }
 if($cheker->num_rows > 0)
 while($row = $checker->fetch_assoc())
 {$pass = $row["pasword"];}
 if($pswd == $pass) {
 if(isset($_POST['pwsd']))

 echo $_SERVER[HTTP_REFERER]; 
}
 
$conn->close();
?>



</body>
</html>