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
			<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Error!
				</h4> <strong>Warning!</strong> Something has gone wrong. <a href=<?php echo '"'.$href.'"' ?> class="alert-link">Go Home</a>
			</div>
		</div>
	</div>
</div>