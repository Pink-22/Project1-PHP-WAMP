<?php
$ticketdate = date("Y/m/d");

$email = $_POST["email"];
$query = $_POST["query"];
$status = $_POST["status"];
$tickettype = $_POST["tickettype"]; 

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

$stmt = $conn->prepare("INSERT INTO ticket (ticketdate, email, query, status ,tickettype) VALUES (?, ?, ?, ?, ?)");
$stmt->bindParam(1, $ticketdate);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $query);
$stmt->bindParam(4, $status);
$stmt->bindParam(5, $tickettype);

$stmt->execute();

$msg = ($stmt->rowCount() == 1) ? "Ticket Registration done" : "Ticket Registration not done";
?>
<html>
<head>
    <title>Ticket Registration</title>
</head>
<body>
    <h3><?php echo $msg; ?></h3>
</body>
</html>
