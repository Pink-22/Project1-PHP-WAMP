<?php
session_start();
if(isset($_GET['ticketid'])) {
    $_SESSION['session_ticketid'] = $_GET['ticketid'];
}
$ticketid = $_SESSION['session_ticketid'];
$solution_date = date("Y/m/d");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Solution Form</title>
</head>
<body>
    <h2>Provide Solution for Ticket ID: <?php echo $ticketid; ?></h2>
    <form action="solution.php" method="post">
        <table>
            <tr>
                <td>Solution</td>
                <td><textarea name="solution"></textarea></td>
            </tr>
            <tr>
                <td>Solution Date</td>
                <td><?php echo $solution_date; ?></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ticketid" value="<?php echo $ticketid; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
