<?php
session_start();
$ticketid = $_SESSION['session_ticketid'];
$solution_date=date("Y/m/d");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Solution Form</title>
</head>
<body>
    <form action="installationupdate.php" method="post">
        <table>
            <tr>
                <td>Ticket id</td>
                <td><?php echo $ticketid; ?></td>
</tr>
            <tr>
                <td>Solution</td>
                <td><textarea  name="solution" ></textarea></td>
            </tr>
            <tr>
                <td>Solution Date</td>
<td> <?php echo $solution_date; ?></td>
            </tr>
            <tr>
                <td ><input type="hidden" name="ticketid" value="<?php echo $ticketid; ?>"></td>
            </tr>
            <tr>
                <td> <input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
