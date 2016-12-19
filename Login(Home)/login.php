<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'jobagency');

if($con){

// if I apply in the code of setcookie, in time, +60*60*7, it means
// that expires in 7 hours
// time()+31536000; 31536000 seconds = 1 year
session_start();
$email1 = $_POST['emailaddress'];
$password = $_POST['passwd'];
$id = mysqli_query($con,"SELECT UserID FROM `users` WHERE Email='$email1'");
$name = mysqli_query($con,"SELECT Name FROM `users` WHERE Email='$email1'");

$result = mysqli_query($con,"SELECT * FROM `users` WHERE Email = '$email1' AND Password = md5('$password')");
    //if(mysqli_num_rows($result)){
        $res = mysqli_fetch_array($result);
        
        $_SESSION['emailaddress'] = $res['emailaddress'];
    if($res){
        if(isset($_POST['remember'])){
            setcookie('UserID', $id, time()+31536000);
            setcookie('Name', $name, time()+31536000);
            setcookie('Email', $email1, time()+31536000);
            setcookie('Password', $password, time()+31536000);
        }
		/*echo "Welcome ".$_SESSION['emailaddress'];
        echo "<br>";
        echo "<link rel='stylesheet' href='.\css\style.css' type='text/css'>";
		echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
		echo "<body style='text-align: center;'>";
        echo "You are now Login. click <a href='index.html'>here</a> to go back to main page.";
        echo "</body>";*/
        /*else {
			echo "<link rel='stylesheet' href='.\css\style.css' type='text/css'>";
			echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
            echo "<body style='text-align: center;'>";
            echo "No email found or the email does not match. Please go <a href='index.html'>back</a> and enter the correct login.<br>";
            echo "You may register a new account by clicking<a href='signup.html'> here</a>";
            echo "</body>";
        }*/
        $_SESSION['emailaddress'] = $email1;
        header("location: welcome.php");
    }
 //} mysqli_num_rows finishes here.
}
else{
    echo "WARNING";
    echo "<br>";
    echo "Database connection ERROR";
}
?>