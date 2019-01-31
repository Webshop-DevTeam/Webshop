<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
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

<body>
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
    <div class="container">
        <h1>Log in</h1>
        <form class="form-horizontal" method="post" action="login_validation.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstname">Firstname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname" name="firstname">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pwd_1" placeholder="Enter your new password" name="password_1">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </div>
            <p>Not yet a member? <a href="sign_up.php">Sign up</p>
</body>
</html>