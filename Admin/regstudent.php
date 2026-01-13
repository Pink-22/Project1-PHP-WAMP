<?php

$collegeregno=$_POST["collegeregno"];
$name = $_POST["name"];
$collegename=$_POST["collegename"];
$dept=$_POST["dept"];
$semester=$_POST["semester"];
$email = $_POST["email"];
$password= $_POST["password"];

$phone = $_POST["phone"];

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

$stmt = $conn->prepare("INSERT INTO student (collegeregno,name,collegename,dept,semester, email,password, phone) VALUES (?,?, ?, ?, ?,?,?,?)");
$stmt->bindParam(1, $collegeregno);

$stmt->bindParam(2, $name);
$stmt->bindParam(3, $collegename);
$stmt->bindParam(4, $dept);
$stmt->bindParam(5, $semester);

$stmt->bindParam(6, $email);
$stmt->bindParam(7, $password);
$stmt->bindParam(8, $phone);
$stmt->execute();
$c = $stmt->rowCount();
$msg = " ";
if ($c == 1) {
    $msg = "Registration done";
} else {
    $msg = "Registration not done";
}
?>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h3><?php echo $msg; ?></h3>
</body>
</html>
