<?php
session_start();
session_destroy();
if(isset($_COOKIE['emailaddress']) and isset($_COOKIE['passwd'])){
    $email = $_COOKIE['emailaddress'];
    $pass = $_COOKIE['passwd'];
    setcookie('Email',$email, time()-1);
    setcookie('Password',$pass, time()-1);
}
echo "<center>";
echo "You have logged out. Click <a href='index.html'>here</a> to login again";
echo "</center>";

?>