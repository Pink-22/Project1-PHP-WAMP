<?php
$facultyid = $_REQUEST["param_facultyid"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training programs</title>
</head>
<body>
    <h3>Faculty ID: <?php echo $facultyid; ?></h3>

    <form action="addtraining.php" method="post">
        <table>
            <input type="hidden" name="facultyid" value="<?php echo $facultyid; ?>">

            <tr>
                <td>Subject</td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr>
                <td>Select Department:</td>
                <td>
                    <select name="dept" id="dept" required autofocus>
                        <option value="Civil">Civil</option>
                        <option value="Mechanical">Mechanical</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>From date</td>
                <td><input type="date" name="fromdate"></td>
            </tr>
            <tr>
                <td>To date</td>
                <td><input type="date" name="todate"></td>
            </tr>
            <tr>
                <td>College Name</td>
                <td><input type="text" name="collegename"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
