<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //se ha rellenado el form de logeo

	require ('../../models/mysqli_connect.php'); //nos conectamos a la DB

    $class =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['class'])))); 

    $errors = array(); // Initialize an error array.
    
    // Check for a first name:
    if (empty($_POST['name'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $name =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['name']))));
    }
    
    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $newemail =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['email'])))); 
    }
    
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $pass =  mysqli_real_escape_string($dbc, trim(stripslashes(strip_tags($_POST['pass1']))));
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
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
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
                        
                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
                                    
            } // End of if ($r) IF.

        }else{

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />
            - This email already exists.<br /> </p><p>Please try again.</p><p><br /></p>';

        }
       
        mysqli_close($dbc); // Close the database connection.
   
    }else { // Report the errors.
    
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    } // End of if (empty($errors)) IF.

}

include("index.php");

?>