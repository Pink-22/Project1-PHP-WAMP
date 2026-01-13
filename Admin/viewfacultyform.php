<?php
$msg = " ";
$arr_facultyid = array();
$arr_name = array();
$arr_email = array();
$arr_phone = array();

$conn = new PDO("mysql:host=localhost;dbname=Ticketdb", "root", null);
$stmt = $conn->prepare("select * from faculty");
$stmt->execute(); 

$c = $stmt->rowCount();

if ($c > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($arr_facultyid, $row["facultyid"]);

        array_push($arr_name, $row["name"]);
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
    <title>Faculty details</title>
</head>

<body>
    <h3>Faculty Details</h3>
    <table border="1">
        <thead>
        <th>Facultyid</th>

            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </thead>
        <?php
        $len = count($arr_name);
        for ($i = 0; $i < $len; $i++) { 
            echo "<tr>";
            echo "<td>" . $arr_facultyid[$i] . "</td>";

            echo "<td>" . $arr_name[$i] . "</td>";
            echo "<td>" . $arr_email[$i] . "</td>";
            echo "<td>" . $arr_phone[$i] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
