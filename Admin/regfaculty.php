<?php
$name = $_POST["name"];
$email = $_POST["email"];

$password = $_POST["password"];
$phone = $_POST["phone"];
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("INSERT INTO faculty (facultyid,name, email,  password,phone) VALUES (?, ?, ?, ?,?)");
$stmt->bindParam(1, $facultyid);
$stmt->bindParam(2, $name);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $password);
$stmt->bindParam(5, $phone);
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
    <title>Faculty Registration</title>
</head>
<body>
    <h3><?php echo $msg; ?></h3>
</body>
</html>
