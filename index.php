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
    //build a connection string with the database on phpMyAdmin
    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $db1 = 'db_webshop';

    $db = new mysqli($host,$user,$password, $db1);

    //if the kunde ID equals null, then initialize it to 0, otherwise select the firstname and lastname from kunde table
    if ($_GET["kid"] != 0){
        $kunde = $_GET["kid"];

        $sql2= "SELECT kundenid, firstname FROM kunde WHERE kundenid=" . $kunde;

        $result2 = $db->query($sql2);
        $row2 = $result2->fetch_assoc();

    } else {
        $kunde = 0;
    }
?>
    <!--navbar-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--show the client on the right-hand side of the navbar, once login in-->
                <?php echo "<a class='navbar-brand' href='index.php?kid=" . $kunde . "'>Webshop</a>"; ?>
            </div>
            <!--collapsible navbar for a responsive site-->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"> <?php echo "<a href='index.php?kid=" . $kunde . "'>Home</a>"; ?></li>
                    <li class="active"><?php echo "<a href='kundenliste.php?kid=" . $kunde . "'>Kundenliste</a>"; ?>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorien<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--select -->
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

          echo "<li><a href='sign_up.php?kid=" .$kunde . "'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
          <li><a href='login.php?kid=" . $kunde . "'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        }

        

        
        
        ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Collapsible Navbar</h3>
        <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right
            corner (try to re-size this window).
            <p>Only when the button is clicked, the navigation bar will be displayed.</p>
    </div>

</body>

</html>