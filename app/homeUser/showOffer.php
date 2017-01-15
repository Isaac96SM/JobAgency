<?php 
include('headerUser.html');
//PHP code to show Offer info
if ( (isset($_GET['OfferID'])) && (is_numeric($_GET['OfferID'])) ) {
	require ('../../models/mysqli_connect.php');
    $id = $_GET['OfferID'];
    $q = "SELECT * FROM offers WHERE OfferID = ".$id;
    $r = @mysqli_query ($dbc, $q);
    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    if($num == 1) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center text-info">
                                Offer Information
                            </h3>
                            <dl>
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
                                <dd>
                                    <a href="ActionOffer.php?Action=2&OfferID=' . $row['OfferID'] . '">
                                        <button type="button" class="btn btn-sm btn-warning">
                                            Inscript
                                        </button>
                                </dd>
                            </dl>
                        </div>
                                </thead>
                                <tbody>';
                $qi = "SELECT users.UserID, users.Name, users.Email 
                FROM users INNER JOIN usersoffers 
                ON users.UserID = usersoffers.UserID 
                WHERE usersoffers.OfferID =".$id;
                $ri = @mysqli_query ($dbc, $qi);
                $num1 = mysqli_num_rows($ri);
               
                echo                '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
        }
    } else {
        include('../../models/error.php');
    }
} else {
    include('../../models/error.php');
}
include('footer.html');
?>