<?php
session_start();
$msg="";



$email=$_POST["email"];
$password=$_POST["password"];

$conn=new PDO("mysql:host=localhost; dbname=Ticketdb","root",null);

$stmt= $conn->prepare("select * from student where email=? and password=?");
$stmt->bindparam(1,$email);
$stmt->bindparam(2,$password);
$stmt->execute();
$c=$stmt->rowCount();
if ($c==1)
{
$_SESSION["session_email"]=$email;
$_SESSION["session_password"]=$password;
header('location:Student/studenthome.php');
}
?>

<html >
<head>
    <title>Student login</title>
</head>
<body>
    <?php
  if($c==0)
  {
    $msg=$email."student invalid";
    echo $msg;

  
     }
     ?>
</body>
</html>