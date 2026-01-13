<?php
session_start();
$msg = "";
$arr_ticketid = array();
$arr_ticketdate = array();
$arr_email = array();
$arr_query = array();
$arr_status = array();
$arr_tickettype = array();

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("SELECT * FROM ticket WHERE tickettype='Installation'"); 
$stmt->execute(); 

$c = $stmt->rowCount();

if ($c > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($arr_ticketid, $row["ticketid"]);
        array_push($arr_ticketdate, $row["ticketdate"]);
        array_push($arr_email, $row["email"]); 
        array_push($arr_query, $row["query"]); 
        array_push($arr_status, $row["status"]);
        array_push($arr_tickettype, $row["tickettype"]); 
    }
} else {
    $msg = "No data available for tickets";
}
function updateTicketStatus($conn, $ticketid) {
    $stmt = $conn->prepare("UPDATE ticket SET status='Assigned' WHERE ticketid=:ticketid");
    $stmt->bindParam(':ticketid', $ticketid);
    $stmt->execute();
}


if (isset($_GET['ticket_assigned'])) {
    $assigned_ticketid = $_GET['ticket_assigned'];
    updateTicketStatus($assigned_ticketid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Show tickets</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Ticketid</th>
            <th>Ticketdate</th>
            <th>Email</th>
            <th>Query</th>
            <th>Tickettype</th>
            <th>Status</th>

        </thead>
        <?php
        $len = count($arr_ticketdate);
        for ($i = 0; $i < $len; $i++) { 
            echo "<tr>";
            echo "<td><a href='installationreply.php?ticketid=" . $arr_ticketid[$i] . "'>" . $arr_ticketid[$i] . "</a></td>"; 
            echo "<td>" . $arr_ticketdate[$i] . "</td>";
            echo "<td>" . $arr_email[$i] . "</td>";
            echo "<td>" . $arr_query[$i] . "</td>";
            echo "<td>" . $arr_tickettype[$i] . "</td>";
if (isset($assigned_ticketid) && $arr_ticketid[$i] == $assigned_ticketid) {
    echo "<td>Assigned</td>";
} else {
    echo "<td>" . $arr_status[$i] . "</td>";
}

        }
        ?>
    </table>
</body>
</html>
