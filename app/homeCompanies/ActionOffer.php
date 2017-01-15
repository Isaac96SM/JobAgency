<?php 
include('headerCompanies.html');
//PHP code to create/update/delete Offers
if ( (isset($_GET['Action'])) && (is_numeric($_GET['Action'])) ) {
    require ('../../models/mysqli_connect.php');
    $Action = $_GET['Action'];
    if ($Action == 1) {
        if (!(empty(trim($_GET['title']))) && !(empty(trim($_GET['description'])))) {
            $title = $_GET['title'];
            $description = $_GET['description'];
            $q = "INSERT INTO offers (Title, Description, CompanyID) VALUES ('".$title."','".$description."',".$_COOKIE['CompanyID'].")";

            $r = @mysqli_query ($dbc, $q);

            if($r){
                include('../../models/success.php');
            } else {
                include('../../models/error.php');
            }
        } else {
            if (!((empty(trim($_GET['title']))))) {
                $title = $_GET['title'];
                $href = 'NewOffer.php?Title='.$title;
            } elseif (!((empty(trim($_GET['description']))))) {
                $description = $_GET['description'];
                $href = 'NewOffer.php?Description='.$description;
            } else {
                $href = 'NewOffer.php';
            }
            echo '<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <h4>
                                    Error!
                                </h4> <strong>Warning!</strong> Missing data. <a href="'.$href.'" class="alert-link">Return</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } 
    elseif ($Action == 2) {
        if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
            $id = $_GET['OfferID'];
            if (!(empty(trim($_GET['title']))) && !(empty(trim($_GET['description'])))) {
            $title = $_GET['title'];
            $description = $_GET['description'];
            $q = "UPDATE offers SET Title='".$title."', Description='".$description."' WHERE OfferID=".$id;

            $r = @mysqli_query ($dbc, $q);

            if($r){
                include('../../models/success.php');
            } else {
                include('../../models/error.php');
            }
        } else {
            if (!((empty(trim($_GET['title']))))) {
                $title = $_GET['title'];
                $href = 'NewOffer.php?Action=2&OfferID='.$id.'Title='.$title;
            } elseif (!((empty(trim($_GET['description']))))) {
                $description = $_GET['description'];
                $href = 'NewOffer.php?Action=2&OfferID='.$id.'Description='.$description;
            } else {
                $href = 'NewOffer.php?Action=2&OfferID='.$id;
            }
            echo '<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <h4>
                                    Error!
                                </h4> <strong>Warning!</strong> Missing data. <a href="'.$href.'" class="alert-link">Return</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        }
    } 
    elseif ($Action == 3) {
        if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
            $id = $_GET['OfferID'];
            $q = "DELETE FROM usersoffers WHERE OfferID=".$id;

            $r = @mysqli_query ($dbc, $q);

            if($r){
                $q1 = "DELETE FROM offers WHERE OfferID=".$id;

                $r1 = @mysqli_query ($dbc, $q1);

                if($r1){
                    include('../../models/success.php');
                } else {
                    include('../../models/error.php'); 
                }
            }
        }
    } else {
        include('../../models/error.php');
    }
} else {
   include('../../models/error.php'); 
}
include('footer.html');
?>