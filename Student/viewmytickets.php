<?php
session_start();
$email = $_SESSION["session_email"];
$conn = new PDO("mysql:host=localhost; dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("SELECT * FROM ticket WHERE email = ?");
$stmt->bindParam(1, $email);
$stmt->execute();

$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View My Tickets</title>
</head>
<body>
    <h2>Tickets raised by you</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Ticket Date</th>
                <th>Email</th>
                <th>Ticket Type</th>
                <th>Query</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo $ticket['ticketid']; ?></td>
                    <td><?php echo $ticket['ticketdate']; ?></td>
                    <td><?php echo $ticket['email']; ?></td>
                    <td><?php echo $ticket['tickettype']; ?></td>
                    <td><?php echo $ticket['query']; ?></td>
                    <td>
                        <?php 
                        if ($ticket['status'] == 'Resolved') {
                            echo '<a href="viewsolutions.php?ticketid=' . $ticket['ticketid'] . '">Resolved</a>';
                        } else {
                            echo $ticket['status'];
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
