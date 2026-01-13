<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration</title>
</head>
<body>
    <h2>Faculty Registration</h2>
    <form action="regfaculty.php" method="post">
       
<table>
    <tr>
        <td>Name</td>      
        <td>     <input type="text" id="name" name="name" required>
</td></tr>
<tr>
    <td>Email</td> 

       <td>     <input type="email" id="email" name="email" required>
</td>
          <tr>
            <td>Password</td>
            <td>  <input type="password" id="password" name="password" required>
</td></tr>
        <tr>
            <td>Phone</td>
            <td>
            <input type="text" id="phone" name="phone" required></td>
</tr><td>
            <input type="submit" value="submit" >
</td>
    </form>
</body>
</html>
