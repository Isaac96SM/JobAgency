<?php

if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'jobagencydb');

    $name = $_POST['name'];
    $newemail = $_POST['email'];
    $pword = $_POST['password'];
    $pword2 = $_POST['password2'];

    if($pword != $pword2){
        echo "Passwords do not match. <br>";
        }
    else{
            //en mysqli_query es ($con,"SELECT/INSERT ...");
            $checkexist = mysqli_query($con,"SELECT Name FROM users WHERE Name='$name'");
            if(mysqli_num_rows($checkexist)){
                    echo "<center>";
                    echo "This name already exists, please select different name<br>";
                    echo "</center>";
            }
            else{
                    //en mysqli_query es ($con,"SELECT/INSERT ...");
                    mysqli_query($con,"INSERT INTO users (`Name`,`Email`,`Password`,`RegistrationDate`) VALUES ('$name','$newemail', SHA1('$pword'), CURRENT_TIMESTAMP)");
                    echo "<center>"; 
                    echo "You have successfully registered. Click <a href='index.html' class='button'>here</a> to go start<br>";
                    echo "</center>";
                }
        }

    }

?>

<html>
<head>
</head>

<body>
<form name="form1" method="post" action="register.php">
<table align="center" border="1" width="40%">
<tr>
<td>Enter your name: </td><td><input type="text" name="name"></td>
</tr>

<tr>
<td>Enter your email: </td><td><input type="email" name="email"></td>
</tr>

<tr>
<td>Enter your password: </td><td><input type="password" name="password"></td>
</tr>

<tr>
<td>Repeat your password: </td><td><input type="password" name="password2"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Register"></td>
</tr>

</table>
</form>
</body>

</html>