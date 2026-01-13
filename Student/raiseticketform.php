<?php
    session_start();
    $email = $_SESSION["session_email"];?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket raise by student</title>
</head>
<body>
   

    <form action="raiseticket.php" method="post">
        <table border="1">
            <tr>
            <?php
    $ticketdate = date("Y/m/d");
    ?>
                <td>Ticketdate</td>
                <td><?php echo $ticketdate; ?></td>
            </tr>
          
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>Query</td>
                <td><textarea id="query" name="query" rows="4" cols="50"></textarea></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status" value="New" readonly></td>
            </tr>
            <tr>
                <td>Ticket type</td>
                <td>
                    <select name="tickettype" id="tickettype" required autofocus>
                        <option value="Installation">Installation</option>
                        <option value="Subject">Subject</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
