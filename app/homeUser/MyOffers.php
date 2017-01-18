<?php 
include('headerUser.html');
//PHP code to show the offers that i'm registered'

//PHP code to show the Offers of the company
require ('../../models/mysqli_connect.php');

$q = "SELECT offers.OfferID 
FROM usersoffers 
INNER JOIN offers 
ON usersoffers.OfferID = offers.OfferID 
WHERE usersoffers.UserID = '".$_COOKIE['UserID']."'";
$r = @mysqli_query ($dbc, $q);
// Count the number of returned rows:
$num = mysqli_num_rows($r);
if($num > 0){ //se ha ejecutado algo
    
    echo '<div class="container-fluid">
	        <div class="row">
		        <div class="col-md-12">
			        <h3 class="text-center worktitle">';
	echo                $_COOKIE['Name']." Offers";
	echo	        '</h3>
			        <table class="table table-hover">
				        <thead>
					        <tr>
						        <th>
							        Code
						        </th>
						        <th>
							        Title
						        </th>
								<th>
							        Category
						        </th>
						        <th>
							        Description
                                </th>
                                <th>				
                                </th>
					        </tr>
				        </thead>
                        <tbody>';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $qi = "SELECT * FROM offers where OfferID =".$row['OfferID']." LIMIT 1";
        $ri = @mysqli_query ($dbc, $qi);
        while ($row1 = mysqli_fetch_array($ri, MYSQLI_ASSOC)) { 
            echo '<tr>
			        <td>';
		    echo	    $row1['OfferID'];	
		    echo    '</td>
				    <td>';
		    echo		$row1['Title'];
            echo    '</td>
					<td>';
						if ($row1['Category'] == NULL) { echo 'Others';} else { echo $row1['Category'];};
			echo	'</td>
				    <td>';
		    echo	    $row1['Description'];
		    echo	'</td>';
		    echo	'<td>
						<a href="ActionOffer.php?Action=1&OfferID=' . $row['OfferID'] . '">
							<button type="button" class="btn btn-sm btn-primary">
								Cancel Inscription
							</button>
						</a>
                    </td>    
			    </tr>';
        }
    }
    echo                '</tbody>
			        </table>
		        </div>
	        </div>
        </div>';
}

include('footer.html');
?>