<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Product Details</title>
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


<body style="width: 100%">
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
        <li class="active"><?php echo "<a href='kundenliste.php?kid=" . $kunde . "'>Kundenliste</a>"; ?></li>
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

      <?php

          $product = $_GET['id'];

          $sql1 = "SELECT  productid, prdname, manufracturer, datum, preis, anlager, description, bild FROM produkte WHERE productid=" . $product;

          $result1 = $db->query($sql1);

          $row1 = $result1->fetch_assoc();


      ?>

    

<main class="container" style="margin-top: 100px;">
  <div class="row" style="margin-bottom: 100px">
    <div class="col">
        <?php echo "<img src='" . $row1["bild"] . "' class='w-75'>"; ?> 
    </div>
    <div class="col" style="margin-top: 50px;">
        <?php echo "<p style='font-weight: bold;'> Productname: </p><p>" . $row1["prdname"] . "</p><br><p style='font-weight: bold;'>Hersteller:</p><p>" . $row1["manufracturer"] . "</p><br><p style='font-weight: bold;'>Herstellungsdatum: </p><p>" . $row1["datum"] . "</p><br><p style='font-weight: bold;' >Preis: </p><p>CHF " . $row1["preis"] . "</p><br><p style='font-weight: bold;' >Noch an Lager: </p><p>" . $row1["anlager"] . " Stueck</p><br><br>";
        
        ?>

    <p style='font-weight: bold; ' >Description:</p>

    <?php echo "<p>" . $row1["description"] . "</p>";
        ?>
    </div>
  </div>
    <div style="padding-bottom: 100px;">
        
        
        
    </div>




</main>