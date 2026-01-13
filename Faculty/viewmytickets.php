<?php
session_start();
$facultyid = $_SESSION['session_facultyid'];
$msg = "";

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

$stmt = $conn->prepare("SELECT * FROM ticket WHERE facultyid = ?");
$stmt->bindParam(1, $facultyid);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View My Tickets</title>
</head>
<body>
    <h2>Tickets Assigned to You</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Ticket Date</th>
                <th>Query</th>
                <th>Status</th>
                <th>Ticket Type</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ticket = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><a href='solutionform.php?ticketid=<?php echo $ticket['ticketid']; ?>'><?php echo $ticket['ticketid']; ?></a></td>
                    <td><?php echo $ticket['ticketdate']; ?></td>
                    <td><?php echo $ticket['query']; ?></td>
                    <td>
                        <?php 
                        if ($ticket['status'] == 'Resolved') {
                            echo '<a href="viewsolution.php?ticketid=' . $ticket['ticketid'] . '">Resolved</a>';
                        } else {
                            echo $ticket['status'];
                        }
                        ?>
                    </td>
                    <td><?php echo $ticket['tickettype']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
