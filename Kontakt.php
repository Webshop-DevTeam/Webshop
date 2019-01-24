<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<title>Kontakt</title>
<style>p{ margin:0;} .grid-container{  display: grid;
        grid-row-gap: 50px; padding: 10px;} .grid-item{ margin-bottom: 20px;} .box{width: 50%; float:left; } </style>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="Products.html">Kategorien<span class="caret"></span></a>
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

        <main class="container">

            <div>
                <h1 style="margin-top: 50px;">Kontakt</h1>
            </div>
            <div class="mapouter" style="margin-top: 50px;">
                <div class="gmap_canvas">
                    <iframe width="1000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bbw&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://www.pureblack.de/webdesign/"></a>
                </div>
                <style>.mapouter{text-align:right;height:500px;width:1000px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1000px;}</style>
            </div>
            <div class="clearfix">
                <div class="box">
                        <?php
                            $sql = "SELECT place , street, zip, canton, country FROM filiale";

                            $result = $db->query($sql);
                            
                            if ($result->num_rows > 0) {
                                
                                while($row = $result->fetch_assoc()) {
                                    echo "<div style='margin-top: 50px;'><h5 style='font-weight: bold;' >". $row["place"]."</h5><p>". $row["street"] ."</p><p>". $row["zip"] ."</p><p>". $row["canton"] . "</p><p>". $row["country"] . "</p></div>";
                                }
                            }
                        ?>
    
                </div>
                <div class="box">
                    <h3 style="margin-top:50px;">Kontakt Formular</h3> 
                    <div class="grid-container" style="grid-row-gap: 50px;">
                        <form id="usrform">
                            <div class="grid-item"><p>Lastname</p></div>
                            <div class="grid-item"><input type="text" name="lastname"></div>
                            <div class="grid-item"><p>Firstname</p></div>
                            <div class="grid-item"><input type="text" name="firstname"></div>
                            <div class="grid-item"><p>Email</p></div>
                            <div class="grid-item"><input type="email" name="email"></div>
                            <div class="grid-item"><p>Message</p></div>
                            <div class="grid-item"><textarea rows="4" cols="50" name="comment" form="usrform"></textarea></div>
                            <div class="grid-item"><input type="submit"></div> 
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>