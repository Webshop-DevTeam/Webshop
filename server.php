<?php

    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $db1 = 'db_webshop';
    
    $db = new mysqli($host,$user,$password, $db1);


    $firstname = "";
    $lastname = "";
    $age = 0;
    $gender = "";
    $street = "";
    $location = "";
    $zip = 0;
    $country = "";
    $email = "";
    $year = "";
    $password_1 = "";
    $password_2 = "";
    
    $errors = array();

    //if the register button is clicked

    if (isset($_POST['register']))
    {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $street = htmlspecialchars($_POST['street']);
        $location = htmlspecialchars($_POST['location']);
        $zip = htmlspecialchars($_POST['zip']);
        $country = htmlspecialchars($_POST['country']);
        $email = htmlspecialchars($_POST['email']);
        $year = htmlspecialchars($_POST['year']);
        $password_1 = htmlspecialchars($_POST['password_1']);
        $password_2 = htmlspecialchars($_POST['password_2']); 


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
            array_push($errors, "The two passwords don't match");
        }

        //if they are no errors, save user to database
        if (count($errors) == 0)
        {
            $password = md5($password_1); //encrypt password before storing in database (security)
            $sql = "INSERT INTO kunde (firstname, lastname, age, gender, street, location, zip, country, email, year, password_1) 
            VALUES ('$firstname', '$lastname', '$age', '$gender', '$street', '$location', '$zip', '$country', '$email', '$year', '$password_1')";

            mysqli_query($db, $sql);
        } 
    }
?>