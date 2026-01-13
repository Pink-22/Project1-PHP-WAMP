<?php
$msg = " ";
$arr_collegeregno = array();
$arr_name = array();

$arr_collegename = array();
$arr_dept = array();
$arr_semester = array();

$arr_email = array();
$arr_phone = array();

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("select * from student");
$stmt->execute(); 

$c = $stmt->rowCount();

if ($c > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($arr_collegeregno, $row["collegeregno"]);

        array_push($arr_name, $row["name"]);
        array_push($arr_collegename, $row["collegename"]);
        array_push($arr_dept, $row["dept"]);
        array_push($arr_semester, $row["semester"]);

        array_push($arr_email, $row["email"]); 
        array_push($arr_phone, $row["phone"]); // array
    }
} else {
    $msg = "no data";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Details</title>
</head>

<body>
    <h3>Student Details</h3>
    <table border="1">
        <thead>
        <th>College Reg no</th>

            <th>Name</th>
            <th>College name </th>
            <th>Dept</th>
            <th>sem</th>
            <th>email</th>
            
            <th>phone</th>

        </thead>
        <?php
        $len = count($arr_name);
        for ($i = 0; $i < $len; $i++) { 
            echo "<tr>";
            echo "<td>" . $arr_collegeregno[$i] . "</td>";
            echo "<td>" . $arr_name[$i] . "</td>";

            echo "<td>" . $arr_collegename[$i] . "</td>";
            echo "<td>" . $arr_dept[$i] . "</td>";
            echo "<td>" . $arr_semester[$i] . "</td>";

            echo "<td>" . $arr_email[$i] . "</td>";
            echo "<td>" . $arr_phone[$i] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
