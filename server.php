<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
<?php

$host = 'localhost';
$user = 'root';
$password = 'password';
$db1 = 'db_webshop';

$db = new mysqli($host,$user,$password, $db1);


if ($_GET["kid"] != 0){
  $kunde = $_GET["kid"];

  $sql2= "SELECT kundenid, firstname FROM kunde WHERE kundenid=" . $kunde;

  $result2 = $db->query($sql2);
  $row2 = $result2->fetch_assoc();

 } else {
   $kunde = 0;
 }
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <?php echo "<a class='navbar-brand' href='index.php?kid=" . $kunde . "'>WebSiteName</a>"; ?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"> <?php echo "<a href='index.php?kid=" . $kunde . "'>Home</a>"; ?></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorien<span class="caret"></span></a>
          <ul class="dropdown-menu">

          <?php
                            $sql = "SELECT id, cgname FROM kategorie";

                            $result = $db->query($sql);
                            
                            if ($result->num_rows > 0) {
                                
                                while($row = $result->fetch_assoc()) {
                                    echo "<li><a href='Products.php?id=" . $row["id"] . "&kid=" . $kunde . "'>". $row["cgname"]."</a></li>";
                                }
                            }
                        ?>
          </ul>
          </li>
                      <?php
                       
                       
                      
                      echo"<li><a href='Kontakt.php?kid=" . $kunde . "'>Kontakt</a></li>"; ?>
                      
                    </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <?php 
        
        

        if($kunde != 0){
        
          echo "<li><a href='kunde.php?kid=" . $kunde . "'><span></span>" . $row2["firstname"] . "</a></li>";


        }else{

            echo "<li><a href='sign_up.php?kid=" . $kunde . "'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
            <li><a href='login.php?kid=" . $kunde . "'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        }

        

        
        
        ?>
      </ul>
    </div>
  </div>
</nav>
</body>
<?php


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