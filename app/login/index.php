<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //se ha rellenado el form de logeo

	require ('../mysqli_connect.php'); //nos conectamos a la DB

	$q = "SELECT Email AS email, Password AS password FROM users WHERE Email ='".$_POST['email']."' LIMIT 1";

	$r = @mysqli_query ($dbc, $q);

	// Count the number of returned rows:
	$num = mysqli_num_rows($r);

	if($num > 0){ //se ha ejecutado algo

		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { //obtenemos los valores de la query

			if ($_POST['email'] == $row['email'] && sha1($_POST['pass']) == $row['password']){

				$q = "SELECT Name as name FROM users where Email='".$row['email']."' LIMIT 1";

				$r = @mysqli_query ($dbc, $q);

				while ($row1 = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					echo "Loggeado como: ".$row1['name'];
				}			

			}else{

				echo "No te has logeado, nombre o contraseña incorrecto.";

			}
			
		}

	}

	mysqli_close($dbc); // cerramos la conexion con la DB
}

include("index.html");

?>

