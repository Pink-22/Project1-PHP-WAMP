<?php
$msg = " ";
$arr_facultyid = array();
$arr_subject = array();
$arr_dept = array();
$arr_fromdate = array();
$arr_todate = array();
$arr_collegename = array();

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("select * from training");
$stmt->execute(); 

$c = $stmt->rowCount();

if ($c > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($arr_facultyid, $row["facultyid"]);

        array_push($arr_subject, $row["subject"]);
        array_push($arr_dept, $row["dept"]); 
        array_push($arr_fromdate, $row["fromdate"]);
        array_push($arr_todate, $row["todate"]);
        array_push($arr_collegename, $row["collegename"]);

 // array
    }
} else {
    $msg = "no data";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Faculty details</title>
</head>

<body>
    <h3>Training Details</h3>
    <table border="1">
        <thead>
        <th>Facultyid</th>
<th>Subject</th>
            <th>Department</th>
            <th>From date</th>
            <th>To Date</th>
            <th>College Name</th>
        </thead>
        <?php
        $len = count($arr_subject);
        for ($i = 0; $i < $len; $i++) { 
            echo "<tr>";
            echo "<td>" . $arr_facultyid[$i] . "</td>";
            echo "<td>" . $arr_subject[$i] . "</td>";
            echo "<td>" . $arr_dept[$i] . "</td>";
            echo "<td>" . $arr_fromdate[$i] . "</td>";
            echo "<td>" . $arr_todate[$i] . "</td>";
            echo "<td>" . $arr_collegename[$i] . "</td>";


            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
