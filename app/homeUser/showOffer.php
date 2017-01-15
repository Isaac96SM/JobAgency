<?php 
include('headerUser.html');
//PHP code to show Offer info
$check = false;
if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
	require ('../../models/mysqli_connect.php');
    $id = $_GET['OfferID'];
    $q = "SELECT * FROM offers WHERE OfferID = ".$id;
    $r = @mysqli_query ($dbc, $q);
    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    $check = true;
} elseif (isset($_POST['Title'])) {
    require ('../../models/mysqli_connect.php');
    $title = $_POST['Title'];
    $q = "SELECT * FROM offers WHERE Title LIKE '%".$title."%'";
    $r = @mysqli_query ($dbc, $q);
    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    $check = true;
}
    if($num > 0 && $check) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $qi = "SELECT * FROM usersoffers WHERE UserID = ".$_COOKIE['UserID']." AND OfferID = ".$row['OfferID']." LIMIT 1";
            $ri = @mysqli_query ($dbc, $qi);
            // Count the number of returned rows:
            $numi = mysqli_num_rows($ri);

            echo '<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center text-info">
                                Offer Information
                            </h3>
                            <dl align="center">
                                <dt>
                                    Title
                                </dt>
                                <dd>';
            echo                    $row['Title'].'
                                </dd>
                                <dt>
                                    Description
                                </dt>
                                <dd>';
            echo                    $row['Description'].'
                                </dd>
                                <dd>';
            if ($numi == 0) {
                echo                '<a href="ActionOffer.php?Action=2&OfferID=' . $row['OfferID'] . '">
                                        <button type="button" class="btn btn-sm btn-warning">
                                            Inscript
                                        </button>
                                    </a>';
            } else {
                echo                '<button type="button" class="btn disabled btn-sm btn-warning">
                                            Inscribed
                                    </button>';
            }                 
            echo               '</dd>
                            </dl>
                        </div>
                                </thead>
                                <tbody>               
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
        }
    } else {
        include('../../models/error.php');
    }
include('footer.html');
?>