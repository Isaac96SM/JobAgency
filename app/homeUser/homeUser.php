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
$q1 = "SELECT * FROM users WHERE UserID = '".$_COOKIE['UserID']."'";
$r1 = @mysqli_query ($dbc, $q1);
// Count the number of returned rows:
$num1 = mysqli_num_rows($r1);
if ($num1 > 0) {
    while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
        $register=$row1['RegistrationDate'];
    }
}
mysqli_close($dbc);
?>
<div class="container-fluid">
	<div class="row">
		<div class=" col-md-12">
			<h1 class="welcome text-center" >
                Welcome <?php echo $_COOKIE['Name'].'!'; ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3 class=" inscriptions text-center">
				Inscriptions:
			</h3>
		</div>
		<div class="col-md-4">
			<h1 class=" numoffers text-center text-success">
				<?php echo $count; ?>
			</h1>
		</div>
	</div>
	<div class=" allprofile row">
		<div class="col-md-12">
			<h2 class="profile text-center">
				Profile
			</h2>
			<h2 class="text-center">
				Email: <?php echo $_COOKIE['Email']; ?>
			</h2>
			<h2 class="text-center">
                Registered: <?php echo $register; ?>
			</h2>
		</div>
	</div>
</div>
<?php
include('footer.html');
?>