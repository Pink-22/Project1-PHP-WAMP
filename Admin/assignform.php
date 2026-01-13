<?php
session_start();

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

// Get the ticket ID from the session
$ticketid = $_GET["ticketid"];

// Fetch ticket details from the database
$stmt = $conn->prepare("SELECT * FROM ticket WHERE ticketid = ?");
$stmt->bindParam(1, $ticketid);
$stmt->execute();
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);

// Store ticket details in session variables
$_SESSION["session_ticketid"] = $ticket["ticketid"];
$_SESSION["session_query"] = $ticket["query"];
$_SESSION["session_tickettype"] = $ticket["tickettype"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ticket Details</title>
</head>
<body>
    <h1>Ticket Details assigned by student</h1>
    <table border="1">
        <thead>
            <th>Ticket ID</th>
            <th>Query</th>
            <th>Ticket Type</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $ticket['ticketid']; ?></td>
                <td><?php echo $ticket['query']; ?></td>
                <td><?php echo $ticket['tickettype']; ?></td>
            </tr>
        </tbody>
    </table>

    <?php
    // Fetch faculty data from the database
    $stmt = $conn->prepare("SELECT * FROM faculty");
    $stmt->execute();
    ?>

    <h2>Select Faculty to assign the above ticket</h2>
    <table border="1">
        <thead>
            <th>Faculty ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td><a href='assign.php?facultyid=" . $row['facultyid'] . "'>" . $row['facultyid'] . "</a></td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
