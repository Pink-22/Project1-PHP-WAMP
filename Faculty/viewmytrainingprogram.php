<?php
session_start();
$facultyid = $_SESSION["session_facultyid"];
$conn = new PDO("mysql:host=localhost; dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("SELECT * FROM training WHERE facultyid = ?");
$stmt->bindParam(1, $facultyid);
$stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <title>View My Training Programs</title>
</head>
<body>
    <h2>Training Programs Allocated to You</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Department</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>College Name</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($program = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $program['subject']; ?></td>
                    <td><?php echo $program['dept']; ?></td>
                    <td><?php echo $program['fromdate']; ?></td>
                    <td><?php echo $program['todate']; ?></td>
                    <td><?php echo $program['collegename']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
