<?php
if (isset($_COOKIE['UserID'])) {
    setcookie('CompanyID', '', time()-31536000, '/');
    setcookie('Name', '', time()-31536000, '/');
    setcookie('Email', '', time()-31536000, '/');
    setcookie('Password', '', time()-31536000, '/');
} elseif (isset($_COOKIE['CompanyID'])) {
    setcookie('CompanyID', '', time()-31536000, '/');
    setcookie('Name', '', time()-31536000, '/');
    setcookie('Email', '', time()-31536000, '/');
    setcookie('Password', '', time()-31536000, '/');
}
?>