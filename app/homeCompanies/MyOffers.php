<?php
include('headerCompanies.html');
//PHP code to show the Offers of the company
require ('../../models/mysqli_connect.php');

$q = "SELECT * FROM offers WHERE CompanyID = '".$_COOKIE['CompanyID']."'";

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
			        <table class="table table-bordered">
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
                                    Inscriptions
                                </th>
                                <th>				
                                </th>
					        </tr>
				        </thead>
                        <tbody>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

        $qi = "SELECT COUNT(OfferID) AS Inscriptions FROM usersoffers where OfferID =".$row['OfferID']." LIMIT 1";

        $ri = @mysqli_query ($dbc, $qi);

        while ($row1 = mysqli_fetch_array($ri, MYSQLI_ASSOC)) { 

            echo '<tr>
			        <td>';
		    echo	    $row['OfferID'];	
		    echo    '</td>
				    <td>';
		    echo		$row['Title'];
            echo    '</td>
					<td>';
						if ($row['Category'] == NULL) { echo 'Others';} else { echo $row['Category'];};	
			echo	'</td>
				    <td>';
		    echo	    $row['Description'];
		    echo	'</td>
				    <td>';
		    echo		$row1['Inscriptions'];
		    echo	'</td>
                    <td>
						<a href="Offer.php?OfferID=' . $row['OfferID'] . '">
							<button type="button" class="btn btn-sm btn-primary">
								View
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