<?php
session_start();
$msg="";
if(!isset($_SESSION["session_email"]))
{
    header('location:adminhome.php');


}
$currentpassword=$_POST["currentpassword"];
$newpassword=$_POST["newpassword"];
//echo $currentpassword." ".$_SESSION["session_password"];

if($currentpassword==$_SESSION["session_password"])
{
    
    $conn=new PDO("mysql:host=localhost; dbname=Ticketdb","root",null);

$stmt= $conn->prepare("update  student  set   password=?  where email=? ");
$stmt->bindparam(1,$newpassword);
$stmt->bindparam(2,$_SESSION["session_email"]);
$stmt->execute();
$c=$stmt->rowCount();
if ($c==1)

{
$msg="success password updated";
}
else{
    $msg="update password fail";

}
}
else{
    $msg="current password invalid";
}


?>
<html >
<head>
    <title>password</title>
</head>
<body>
    <?php
    echo $msg;
    ?>
</body>
</html>

