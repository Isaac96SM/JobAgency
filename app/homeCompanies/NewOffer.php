<?php 
include('headerCompanies.html');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form" action="ActionOffer.php?" method="GET">
				<div class="form-group">
					<label for="title">
						Title
					</label>
					<input type="title" name="title" class="form-control" id="title" value=<?php if (isset($_GET['Title'])) echo $_GET['Title']; ?>>
					</input>
				</div>
				<div class="form-group">
					 
					<label for="description">
						Description
					</label>
					<textarea type="description" rows="10" cols="0" name="description" class="form-control" id="description" value=<?php if (isset($_GET['Description'])) echo $_GET['Description']; ?>></textarea>
					<input for="action" type="action" id="action" name="Action" value=1 hidden></input>
				</div>
				<button type="submit" class="btn btn-primary">
					Create offer
				</button>
			</form>
		</div>
	</div>
</div>
<?php
include('footer.html');
?>