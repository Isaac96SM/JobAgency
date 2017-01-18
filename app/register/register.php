<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //se ha rellenado el form de logeo

	require ('../../models/mysqli_connect.php'); //nos conectamos a la DB

    $class =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['class'])))); 

    $errors = array(); // Initialize an error array.
    
    // Check for a first name:
    if (empty($_POST['name'])) {
        $errors[] = 'You forgot to enter your first name';
    } else {
        $name =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['name']))));
    }
    
    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address';
    } else {
        $newemail =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['email'])))); 
    }
    
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password';
        } else {
            $pass =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['pass1']))));
        }
    } else {
        $errors[] = 'You forgot to enter your password';
    }

    
    if (empty($errors)) { // If everything's OK.

            
        // Register the user in the database...
        
        // Make the query:
       
        $q = "SELECT Email AS email FROM ".$class." WHERE Email='".$newemail."'";

        $query = mysqli_query ($dbc, $q);

        $num = mysqli_num_rows($query);

        if ($class == "users"){$otherclass = 'companies';}else{$otherclass = 'users';}

        $q3 = "SELECT Email AS email FROM ".$otherclass." WHERE Email='".$newemail."'";

        $query3 = mysqli_query ($dbc, $q3);

        $num3 = mysqli_num_rows($query3);

    

        if ($num == 0 && $num3 == 0)  {
            $q2 = "INSERT INTO ".$class." (Name, Email, Password, RegistrationDate) VALUES ('".$name."','".$newemail."', SHA1('".$pass."'), NOW())";

            $query2 = @mysqli_query($dbc,$q2);
                    
            if ($query2) { // If it ran OK.
        
            $q4 = "SELECT * FROM ".$class." WHERE Email = '".$newemail."' LIMIT 1";

            $query4 = @mysqli_query($dbc,$q4);
            
            while ($row1 = mysqli_fetch_array($query4, MYSQLI_ASSOC)) {
        
                // Print a message:
                if ($class == 'companies') {
                    require ('../../models/cookiesCompany.php');
                    header("location: ../homeCompanies/homeCompanies.php");
                    exit;
                } else {
                    require ('../../models/cookiesUser.php');
					header("location: ../homeUser/homeUser.php");
					exit;
                } 
               }     
            } else { // If it did not run OK.
                        
                // Public message:
                include('../../models/error.php');
                                    
            } // End of if ($r) IF.

        }else{
            echo '<div class="row navbar-fixed-top">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <h4>
                                    <strong>Warning!</strong> This email already exists.
                                </h4> 
                            </div>
                        </div>
                    </div>';
        }
       
        mysqli_close($dbc); // Close the database connection.
   
    }else { // Report the errors.
        $errorsString = '';
        foreach ($errors as $msg) { // Print each error.
            $errorsString = $errorsString.$msg.". ";
        }
        echo '<div class="row navbar-fixed-top">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">                   
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×
                                </button>
                                <h4>
                                    <strong>Warning!</strong> '.$errorsString.'
                                </h4> 
                            </div>
                        </div>
                    </div>';        
    } // End of if (empty($errors)) IF.

}

include("index.php");

?>