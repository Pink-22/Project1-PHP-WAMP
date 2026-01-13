<?php
session_start();
$msg="";



$email=$_POST["email"];
$password=$_POST["password"];
$facultyid=0;

$conn=new PDO("mysql:host=localhost; dbname=Ticketdb","root",null);

$stmt= $conn->prepare("select * from faculty where email=? and password=?");
$stmt->bindparam(1,$email);
$stmt->bindparam(2,$password);
$stmt->execute();
$c=$stmt->rowCount();
if ($c==1)
{
  //getfacultyid from table
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $facultyid=$row['facultyid'];
  }
  $_SESSION["session_email"]=$email;
  $_SESSION["session_password"]=$password;
  $_SESSION["session_facultyid"]=$facultyid;
  header('location:Faculty/facultyhome.php');
}
?>

<html >
<head>
    <title>Faculty login</title>
</head>
<body>
    <?php
  if($c==0)
  {
    $msg=$email."faculty invalid";
    echo $msg;

  
     }
     ?>
</body>
</html>