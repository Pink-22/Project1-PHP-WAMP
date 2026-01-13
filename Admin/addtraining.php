<?php
$facultyid=$_POST["facultyid"];
$subject = $_POST["subject"];
$dept = $_POST["dept"];
$facultyid = $_POST["facultyid"];
$fromdate = $_POST["fromdate"];
$todate = $_POST["todate"];
$collegename = $_POST["collegename"];
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("INSERT INTO training ( subject, dept,facultyid, fromdate, todate, collegename) VALUES (?, ?, ?, ?, ?, ?)");


$stmt->bindParam(1, $subject);
$stmt->bindParam(2, $dept);
$stmt->bindParam(3, $facultyid);
$stmt->bindParam(4, $fromdate);
$stmt->bindParam(5, $todate);
$stmt->bindParam(6, $collegename);

$stmt->execute();
if ($stmt->rowCount() == 1) {
    $msg = "Registration successful";
} else {
    $msg = "Registration failed";
}
?>

<html>
<head>
    <title>Training Registration</title>
</head>
<body>
    <h3><?php echo $msg; ?></h3>
</body>
</html>
