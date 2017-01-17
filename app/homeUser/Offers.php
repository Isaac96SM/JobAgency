<?php 
include('headerUser.html');
//PHP code to show last offers

require ('../../models/mysqli_connect.php');
$q = "SELECT offers.Title, offers.Category, offers.Description, offers.OfferID, companies.Name FROM offers INNER JOIN companies on offers.CompanyID = companies.CompanyID ORDER BY OfferID DESC";
$r = @mysqli_query ($dbc, $q);
// Count the number of returned rows:
$num = mysqli_num_rows($r);
if($num > 0){ //se ha ejecutado algo
    
    echo '<div class="table-responsive container-fluid">
	        <div class="row">
		        <div class="col-md-12">
			        <h3 class="text-center worktitle">';
	echo               "Work Offers";
	echo	        '</h3>
			        <table class="table table-hover">
				        <thead>
					        <tr>
						        <th>
							        Code
						        </th>
								<th>
									Company
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
		$qi = "SELECT * FROM usersoffers WHERE OfferID = ".$row['OfferID']." AND UserID = ".$_COOKIE['UserID']." LIMIT 1";
		$ri = @mysqli_query ($dbc, $qi);
		// Count the number of returned rows:
		$num1 = mysqli_num_rows($ri);
		if($num1 == 1){
			$inscribed = true;
		} else {
			$inscribed = false;
		}
            echo '<tr>
			        <td>';
		    echo	    $row['OfferID'];	
		    echo    '</td>';
			echo '<td>';
			echo 	$row['Name'];
			echo			    '</td><td>';
		    echo		$row['Title'];
            echo    '</td><td>';
						if ($row['Category'] == NULL) { echo 'Others';} else { echo $row['Category'];};
			echo    '</td>
				    <td>';
		    echo	    $row['Description'];
			if ($inscribed) {
				echo	'</td>
						<td>
								<button type="button" class="btn disabled btn-sm btn-primary">
									You are inscribed
								</button>
						</td>      
					</tr>';
			} else {
				echo	'</td>
						<td>
							<a href="showOffer.php?OfferID=' . $row['OfferID'] . '">
								<button type="button" class="btn btn-sm btn-primary">
									Inscript
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