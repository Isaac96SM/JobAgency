<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //se ha rellenado el form de logeo

	require ('../../models/mysqli_connect.php'); //nos conectamos a la DB

	$name = $_POST['name'];
    $newemail = $_POST['email'];
    $pword = $_POST['pass1'];
    $pword2 = $_POST['pass2'];
    $class = $_POST['class'];

    if($pword != $pword2){
        echo "Passwords do not match. <br>";
    }else{

            $query= "SELECT Email FROM '".$class."' WHERE Email='".$newemail."'";

            $checkexist = @mysqli_query($dbc, $query);

            $num = mysqli_num_rows($checkexist);
            
            if($num == 1){
                    echo "<center>";
                    echo "This email already exists, please select different name<br>";
                    echo "</center>";
            }else{
                    //en mysqli_query es ($con,"SELECT/INSERT ...");
                    mysqli_query($dbc,"INSERT INTO '".$class."' (`Name`,`Email`,`Password`,`RegistrationDate`) VALUES ('".$name."','".$newemail."', SHA1('".$pword."'), CURRENT_TIMESTAMP)");
                    echo "<center>"; 
                    echo "You have successfully registered.";
                    echo "</center>";
            }

    }

}

include("register.html");

?>

