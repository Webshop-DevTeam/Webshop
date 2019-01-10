<?php
    $db = mysqli_connect('localhost', 'root', '', 'kunde')

    $firstname = mysql_real_escape_string($_POST['firstname']);
    $lastname = mysql_real_escape_string($_POST['lastname']);
    $age = mysql_real_escape_string($_POST['age']);
    $gender = mysql_real_escape_string($_POST['gender']);
    $street = mysql_real_escape_string($_POST['street']);
    $location = mysql_real_escape_string($_POST['location']);
    $zip = mysql_real_escape_string($_POST['zip']);
    $country = mysql_real_escape_string($_POST['country']);
    $email = mysql_real_escape_string($_POST['email']);
    $year = mysql_real_escape_string($_POST['year']);
    $password = mysql_real_escape_string($_POST['password']);

    $errors = array();

    //if the register button is clicked

    if (isset($_POST['register']))
    {
        //ensure the form field are filled properly
        if (empty('firstname'))
        {
            array_push($errors, "Firstname is required");
        }  
        if (empty('lastname'))
        {
            array_push($errors, "Lastname is required");
        } 
        if (empty('street'))
        {
            array_push($errors, "Street is required");
        } 
        if (empty('location'))
        {
            array_push($errors, "Location is required");
        } 
        if (empty('zip'))
        {
            array_push($errors, "Zip is required");
        } 
        if (empty('country'))
        {
            array_push($errors, "Country is required");
        } 
        if (empty('email'))
        {
            array_push($errors, "Email is required");
        }  
        if (empty('password'))
        {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2)
        {
            array_push($erros, "The two passwords don't match")
        }

        //if they are no errors, save user to database
        if (count($errors) == 0)
        {
            $password = md5($password_1); //encrypt password before storing in database (security)
            $sql = "INSERT INTO kunde (firstname, lastname, age, gender, street, location, zip, country, email, year, password) 
            VALUES ('$firstname', '$lastname', '$age', '$gender', '$street'. '$location'. '$zip'. '$country', '$email', '$year'. '$password')";

            mysqli_query($db, $sql)
        }
        
    }

?>