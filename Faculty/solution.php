<?php
session_start();

if(isset($_POST["solution"]) && isset($_POST["ticketid"])) {
    $solution = $_POST["solution"];
    $ticketid = $_POST["ticketid"];
    $facultyid = $_SESSION["session_facultyid"];
    $solutionDate = date("Y/m/d");

    // Database connection
    $conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);

    $stmt = $conn->prepare("INSERT INTO solution (ticketid, facultyid, solution, solution_date) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $ticketid);
    $stmt->bindParam(2, $facultyid);
    $stmt->bindParam(3, $solution);
    $stmt->bindParam(4, $solutionDate);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE ticket SET status='Resolved' WHERE ticketid = ?");
    $stmt->bindParam(1, $ticketid);
    $stmt->execute();

    echo "Solution added successfully.";
} else {
    echo "Solution could not be added.";
}
?>
