<?php 
include('headerUser.html');
require ('../../models/mysqli_connect.php');
$q = "SELECT count(OfferID) as Count FROM usersoffers WHERE UserID = '".$_COOKIE['UserID']."'";
$r = @mysqli_query ($dbc, $q);
// Count the number of returned rows:
$num = mysqli_num_rows($r);
if ($num > 0) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $count = $row['Count'];
    }
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">
                Welcome <?php echo $_COOKIE['Name'].'!'; ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3 class="text-info text-center">
				Inscriptions:
			</h3>
		</div>
		<div class="col-md-4">
			<h1 class="text-center text-success">
				<?php echo $count; ?>
			</h1>
		</div>
	</div>
</div>
<?php
include('footer.html');
?>