<?php 
include('headerCompanies.html');
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
} elseif ((isset($_POST['Title']))) {
    require ('../../models/mysqli_connect.php');
    $title = $_POST['Title'];
    $q = "SELECT * FROM offers WHERE CompanyID = ".$_COOKIE['CompanyID']." AND (Title LIKE '%".$title."%' OR Description LIKE '%".$title."%' OR Category LIKE '%".$title."%')";

    $r = @mysqli_query ($dbc, $q);

    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    $check = true;
}
    if($num > 0 && $check) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class=" offer container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="worktitle text-center">
                                Offer Information
                            </h3>
                            <dl style="text-align:center;">
                                <dt>
                                    Title </br>
                                </dt>
                                <dd>';
            echo                    $row['Title'].'
                                </br></br></dd>
                                <dt>
                                    Category </br>
                                </dt>
                                <dd>';
                                    if ($row['Category'] == NULL) { echo 'Others';} else { echo $row['Category'];};
            echo                '</br></br></dd>
                                <dt>
                                    Description </br>
                                </dt>
                                <dd>';
            echo                    $row['Description'].'
                                </br></br></dd>
                                <dt>
                                    Actions </br>
                                </dt>
                                <dd>
                                </br>
                                    <a href="NewOffer.php?Action=2&OfferID=' . $row['OfferID'] . '">
                                        <button type="button" class="btn btn-lg btn-info">
                                            Edit Offer
                                        </button>
                                    </a></br></br>
                                    <a href="ActionOffer.php?Action=3&OfferID=' . $row['OfferID'] . '">
                                        <button type="button" class="btn btn-lg btn-danger">
                                            Remove Offer
                                        </button>
                                    </a>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center worktitle">
                                Inscriptions
                            </h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>';
                $qi = "SELECT users.UserID, users.Name, users.Email 
                FROM users INNER JOIN usersoffers 
                ON users.UserID = usersoffers.UserID 
                WHERE usersoffers.OfferID =".$row['OfferID'];

                $ri = @mysqli_query ($dbc, $qi);

                $num1 = mysqli_num_rows($ri);

                if ($num1 > 0) {
                    while ($row1 = mysqli_fetch_array($ri, MYSQLI_ASSOC)) {
                        echo '<tr>
                                <td>';
                        echo        $row1['UserID'].'
                                </td>
                                <td>';
                        echo        $row1['Name'].'
                                </td>
                                <td>';
                        echo        $row1['Email'].'
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr>
                            <td>
                                No inscriptions
                            </td>
                            <td>
                                -
                            </td>
                            <td>
                                -
                            </td>
                         </tr>';
                }
                echo                '</tbody>
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