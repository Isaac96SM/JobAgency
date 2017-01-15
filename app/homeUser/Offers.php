<?php 
include('headerUser.html');
//PHP code to show last offers

require ('../../models/mysqli_connect.php');
$q = "SELECT * FROM offers ORDER BY OfferID";
$r = @mysqli_query ($dbc, $q);
// Count the number of returned rows:
$num = mysqli_num_rows($r);
if($num > 0){ //se ha ejecutado algo
    
    echo '<div class="container-fluid">
	        <div class="row">
		        <div class="col-md-12">
			        <h3 class="text-center text-info">';
	echo               "Work Offers";
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
							        Description
                                </th>
                                <th>				
                                </th>
					        </tr>
				        </thead>
                        <tbody>';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<tr>
			        <td>';
		    echo	    $row['OfferID'];	
		    echo    '</td>
				    <td>';
		    echo		$row['Title'];
            echo    '</td>
				    <td>';
		    echo	    $row['Description'];
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
    echo                '</tbody>
			        </table>
		        </div>
	        </div>
        </div>';
}



include('footer.html');
?>