<!DOCTYPE html>
<html class="full" lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico">

    <title>Register in JobNow!</title>

    <meta name="author" content="IAW-Team">

    <link href="../../models/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
<div id="cuerpo">
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header">
				<h1>
				<img src="../../models/images/logo2.png" width="50%">
				</h1>
				
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center" name="title2"  style="color:white;">
				Sign up to use the platform 
			</h3>
		</div>
	</div>
	<div class="row">
		<div id="cuerpo" class="col-xs-12">
			<form role="form" action="register.php" method="post">
				<div class="form-group col-xs-2 col-xs-offset-5">
					 
					<label for="Email" style="color:white;">
						Email address
					</label>
					<input type="email" class="form-control" name='email' id="Email" value=<?php if (isset($newemail)) echo htmlentities($newemail); ?>>
				</div>
				<div class="form-group col-xs-2 col-xs-offset-5">
					 
					<label for="Email1" style="color:white;">
						Name
					</label>
					<input type="name" class="form-control" name='name' id="Name" value=<?php if (isset($name)) echo htmlentities($name); ?>>
				</div>
				<div class="form-group col-xs-2 col-xs-offset-5">
					 
					<label for="Password2"  style="color:white;">
						Password
					</label>
					<input type="password" class="form-control" name='pass1' id="Password1">
				</div>
				<div class="form-group col-xs-2 col-xs-offset-5">
					 
					
					<label for="Password2"  style="color:white;">
						Confirm Password
					</label>
					
					<input type="password" class="form-control" name='pass2' id="Password2">
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox col-xs-2 col-xs-offset-4">
							 
							<label  style="color:white;">
								<input name="class" type="radio" value="users" checked/> I'm a particular
							</label>
							<label  style="color:white;">
								<input name="class" type="radio" value="companies"/> I'm a Company
							</label>
						</div>
					</div>
				</div>
				<div class="col-xs-2 col-xs-offset-5">
				<button type="submit" class="btn btn-default">
					Sign Up
				</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row" style="clear: both;">
		<div class="col-md-12">
			<p id="fondo" class="text-center text-info">
				Copyright &#169; 2016 JobNow!</br>
				All rights reserved

				This product is protected by copyright and distributed </br>
				under licenses restricting copying, distributions, and decompilation
			</p>
		</div>
	</div>
</div>
</div>
    <script src="../../models/js/jquery.min.js"></script>
    <script src="../../models/js/bootstrap.min.js"></script>
    <script src="../../models/js/scripts.js"></script>
  </body>
</html>