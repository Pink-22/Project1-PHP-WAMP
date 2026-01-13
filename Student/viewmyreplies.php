<?php
session_start();

// Ensure the user is logged in as a student
if (!isset($_SESSION['session_email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

// Retrieve student's email from the session
$email = $_SESSION["session_email"];

// Fetch all tickets raised by the student along with their solutions
$stmt = $conn->prepare("SELECT t.ticketid, t.ticketdate, t.tickettype, t.query, s.solution, s.solution_date
                        FROM ticket t
                        LEFT JOIN solution s ON t.ticketid = s.ticketid
                        WHERE t.email = ?");
$stmt->bindParam(1, $email);
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View My Replies</title>
</head>
<body>
    <h2>My Ticket Replies</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Ticket Date</th>
                <th>Ticket Type</th>
                <th>Query</th>
                <th>Solution</th>
                <th>Solution Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo $ticket['ticketid']; ?></td>
                    <td><?php echo $ticket['ticketdate']; ?></td>
                    <td><?php echo $ticket['tickettype']; ?></td>
                    <td><?php echo $ticket['query']; ?></td>
                    <td><?php echo isset($ticket['solution']) ? $ticket['solution'] : "No solution provided"; ?></td>
                    <td><?php echo isset($ticket['solution_date']) ? $ticket['solution_date'] : ""; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
