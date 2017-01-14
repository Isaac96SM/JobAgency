<?php
if (isset($_COOKIE['UserID'])) {
	$href = '../homeUser/homeUser.php';
} elseif (isset($_COOKIE['CompanyID'])) {
	$href = '../homeCompanies/homeCompanies.php';
} else {
	$href = '../login/index.html';
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-success">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Alert!
				</h4> <strong>Success!</strong> Everything has gone fine. <a href=<?php echo '"'.$href.'"' ?> class="alert-link">Go Home</a>
			</div>
		</div>
	</div>
</div>