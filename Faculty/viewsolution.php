<?php
session_start();

// Retrieve ticket ID from the URL parameter
$ticketid = $_GET['ticketid'];

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

// Retrieve solution for the given ticket ID
$stmt = $conn->prepare("SELECT * FROM solution WHERE ticketid = ?");
$stmt->bindParam(1, $ticketid);
$stmt->execute();
$solution = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Solution</title>
</head>
<body>
    <h2>View Solution for Ticket ID: <?php echo $ticketid; ?></h2>

    <p><?php echo $solution ? $solution['solution'] : "No solution provided yet."; ?></p>
</body>
</html>
