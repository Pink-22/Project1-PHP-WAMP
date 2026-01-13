<?php
session_start();

// Ensure the user is logged in as a student
if (!isset($_SESSION['session_email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

// Retrieve ticket ID from the URL parameter
$ticketid = $_GET['ticketid'];

// Fetch solution for the given ticket ID
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

    <?php if ($solution): ?>
        <p><?php echo $solution['solution']; ?></p>
    <?php else: ?>
        <p>No solution provided yet.</p>
    <?php endif; ?>
</body>
</html>
