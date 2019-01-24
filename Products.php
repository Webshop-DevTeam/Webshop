<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Productpage</title>
</head>

<?php

$host = 'localhost';
$user = 'root';
$password = 'password';
$db1 = 'db_webshop';

$db = new mysqli($host,$user,$password, $db1);

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
                    <a class="navbar-brand" href="index.php">WebSiteName</a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="index.php">Home</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="Products.php">Kategorien<span class="caret"></span></a>
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
                      <li><a href="#">Page 3</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                  </div>
                </div>
              </nav>


              <?php

                $category = $_GET['id'];

                $q = "SELECT cgname FROM kategorie WHERE  id=" . $category;
                $result = $db->query($q);
                $row = $result->fetch_assoc();

                $qp = "SELECT productid, prdname, preis, bild FROM produkte WHERE kategorieidfs=" . $category;

                $result1 = $db->query($qp);
                            
                            if ($result->num_rows > 0) {
                                
                                while($row1 = $result1->fetch_assoc()) {
                                    echo "<div class='col-xs-2 text-center'><img src='" . $row1["bild"] . "' style='margin-bottom: 20px;'><br><a href='ProductDetails.php?id=" . $row1["productid"] . "'>" . $row1["prdname"] . "<br>CHF " . $row1["preis"] . "</a></div>";
                                }
                            }
        
              ?>

    <header class="container">
        <?php echo "<h1>" . $row["cgname"] . "</h1>"; ?>
    </header>
    <main>
        <div class="container-fluid" style="margin-top: 100px; padding-left: 200px;">
             <div class="row" style="margin-bottom: 50px;">

            <?php
                  if ($result->num_rows > 0) {
                                
                    while($row1 = $result1->fetch_assoc()) {
                        echo "<div class='col-xs-2 text-center'><img src='" . $row1["bild"] . "' style='margin-bottom: 20px;'><br><a href='ProductDetails.php?id=" . $row1["productid"] . "'>" . $row1["prdname"] . "<br>CHF " . $row1["preis"] . "</a></div>";
                    }
                }


            ?>


            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-xs-2 text-center" style="margin-bottom: 20px;"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 1<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 2<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 3<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 4<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 5<br>Preis</a></div>
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-xs-2 text-center" style="margin-bottom: 20px;"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 1<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 2<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 3<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 4<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 5<br>Preis</a></div>
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-xs-2 text-center" style="margin-bottom: 20px;"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 1<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 2<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 3<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 4<br>Preis</a></div>
                <div class="col-xs-2 text-center"><img src="bluesquare.png" style="margin-bottom: 20px;"><br><a href="ProductDetails.html">Product 5<br>Preis</a></div>
            </div>
        </div>
    </main>





</body>