<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    
    <form action="regstudent.php" method="post">
    <h2>Student Registration</h2>



    <table>
    <tr>
        <td>College regno</td>
        <td> <input type="text" id="collegeregno" name="collegeregno" required></td>
    </tr>


<tr>
    <td>Name</td>
     <td><input type="text" id="name" name="name" required></td>
</tr>
       

<tr>
            <td>College Name     </td>
<td><input type="text" id="collegename" name="collegename" required></td>     
</tr>


<tr>
    <td>dept</td>
    <td><input type="text" id="dept" name="dept" required>
</td>
        
<tr>
    <td>sem</td>
    <td> <input type="text" id="semester" name="semester" required>
</td>
</tr>


<tr>
    <td>Email</td>
<td> <input type="email" id="email" name="email" required>
</td>
</tr>
<tr>
            <td>Password</td>
            <td>  <input type="password" id="password" name="password" required>
</td></tr>
     
        <tr>
            <td>Phone</td>
            <td> <input type="text" id="phone" name="phone" required></td>
</tr>
<br/>
        <td> <input type="submit" value="submit" ></td>
    </form>
</body>
</html>
