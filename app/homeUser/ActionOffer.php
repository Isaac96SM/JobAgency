<?php 
include('headerUser.html');
//PHP code to create/update/delete Offers
if ( (isset($_GET['Action'])) && (is_numeric($_GET['Action'])) ) {
    require ('../../models/mysqli_connect.php');
    $Action = $_GET['Action'];
    if ($Action == 1) {
        if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
            $id = $_GET['OfferID'];
            $q = "DELETE FROM usersoffers WHERE OfferID=".$id." and UserID=".$_COOKIE['UserID'];

            $r = @mysqli_query ($dbc, $q);

            if($r){
                include('../../models/success.php');
            } else {
                include('../../models/error.php');
            }
        }
    } elseif($Action ==2){
        if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
            $id = $_GET['OfferID'];
            $q = "INSERT INTO usersoffers (UserID, OfferID) VALUES (".$_COOKIE['UserID'].", ".$id.")";

            $r = @mysqli_query ($dbc, $q);

            if($r){
                include('../../models/success.php');
            } else {
                include('../../models/error.php');
            }

        }
    } else {
        include('../../models/error.php');
    }
    mysqli_close($dbc);
} else {
   include('../../models/error.php'); 
}
include('footer.html');
?>