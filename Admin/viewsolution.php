<?php
session_start();

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

$stmt = $conn->prepare("SELECT * FROM solution");
$stmt->execute();
$solutions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Solutions</title>
</head>
<body>
    <h2>View Solutions for Tickets</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Solution</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutions as $solution): ?>
                <tr>
                    <td><?php echo $solution['ticketid']; ?></td>
                    <td><?php echo $solution['solution']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
