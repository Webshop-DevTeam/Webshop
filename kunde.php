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

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorien<span class="caret"></span></a>
          <ul class="dropdown-menu">

          <?php
                            $sql = "SELECT id, cgname FROM kategorie";

                            $result = $db->query($sql);
                            
                            if ($result->num_rows > 0) {
                                
                                while($row = $result->fetch_assoc()) {
                                    echo "<li><a href='Products.php?id=" . $row["id"] . "'>". $row["cgname"]."</a></li>";
                                }
                            }
                        ?>
          </ul>
        </li>
        <li><a href="Kontakt.php">Kontakt</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <?php 
        
        $kunde = $_GET["kid"];

        if($kunde != null){
          $sql2= "SELECT kundenid, firstname FROM kunde WHERE kundenid=" . $kunde;
         
          $result2 = $db->query($sql2);
          $row2 = $result2->fetch_assoc();

          echo "<li><a href='kunde.php?kid=" . $row2["kundenid"] . "'><span></span>" . $row2["firstname"] . "</a></li>";


        }else{

          echo "<li><a href='sign_up.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        }
        
        ?>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Kundenname</h3>
  <p>Kundenseite</p>
</div>

</body>
</html>