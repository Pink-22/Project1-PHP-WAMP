<?php
session_start();
$msg="";
if(isset($_SESSION["session_email"]))
{
    $email=$_SESSION["session_email"];
}

else{
    header('location:studenthome.php');

}
?>
<html>
    <head> 
    <title>Change Password</title>
</head>
<body>
<form method="POST" action="changepassword.php" onsubmit="return validate()">
<h3>Change password</h3>
<table>
<tr>
                    <td>current Password:</td>
                    <td><input type="password" id="currentpassword" name="currentpassword" required autofocus></td>
                 </tr>
<tr>
                    <td>New Password:</td>
                    <td><input type="password" id="newpassword" name="newpassword" required autofocus></td>
                 </tr>

                 <tr>
                    <td>Confirm password:</td>
                    <td><input type="password" id="confirmpassword" name="confirmpassword" required autofocus></td>
                 </tr>
                 <tr>
                    <td>Submit</td>
                    <td><input type ="submit" value="results"></td>
                </tr>

                 </table>
                 </form>
                 <script>
                    function validate()
                    {
                        var newpassword=document.getElementById("newpassword").value;
                        var confirmpassword=document.getElementById("confirmpassword").value;

                    }

                    if(newpassword==confirmpassword)
                    { return True;}
                    else
                    {
                        alert("New & confirm password doesnt match");
                        return False;
                    }
                 </script>
                 </table>


                 </body>
                 </html>


