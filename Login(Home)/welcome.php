<?php
session_start();
echo "Welcome ".$_SESSION['emailaddress'];
echo "Logout <a href='logout.php'>here</a>";
?>