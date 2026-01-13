<?php
session_start();
$msg="";



$email=$_POST["email"];
$password=$_POST["password"];

$conn=new PDO("mysql:host=localhost; dbname=Ticketdb","root",null);

$stmt= $conn->prepare("select * from admin where email=? and password=?");
$stmt->bindparam(1,$email);
$stmt->bindparam(2,$password);
$stmt->execute();
$c=$stmt->rowCount();
if ($c==1)

{
$_SESSION["session_email"]=$email;
$_SESSION["session_password"]=$password;
header('location:admin/adminhome.php');
}
?>

<html >
<head>
    <title>User login</title>
</head>
<body>
    <?php
  if($c==0)
  {
    $msg=$email."user invalid";
    echo $msg;

  
     }
     ?>
</body>
</html>