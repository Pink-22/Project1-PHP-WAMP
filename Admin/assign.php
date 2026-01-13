<?php
session_start();

$ticketid = $_SESSION["session_ticketid"];

if(isset($_GET["facultyid"])) {
    $facultyid = $_GET["facultyid"];
}  

// Database connection
$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

$stmt = $conn->prepare("UPDATE ticket SET facultyid = ?, status = 'assigned' WHERE ticketid = ?");
$stmt->bindParam(1, $facultyid);
$stmt->bindParam(2, $ticketid);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Ticket successfully assigned to faculty.";
} else {
    echo "Failed to assign ticket to faculty.";
}
?>
