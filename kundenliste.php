<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

<?php
    //Building connection String for the database db_webshop
    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $db1 = 'db_webshop';

    $db = new mysqli($host,$user,$password, $db1);

    /*if($kunde == null)
    {
        echo "<p>error</p>";
    }
    
    $sql2= "SELECT kundenid, firstname FROM kunde WHERE kundenid=" . $kunde;

    //table
    */
    //If the kunde ID equals null, then initialize it to 0, otherwise select the firstname and lastname from kunde table
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
                <?php echo "<a class='navbar-brand' href='index.php?kid=" . $kunde . "'>WebSiteName</a>"; ?>
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
                            <!--show dropdown items from "Kategorien"-->
                            <?php
                                  //the name of the kunde should be shown in the navbar
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
                        //If kunde equals 0, then just show sign up and login, unless you're logged in.
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

    <!--Search for clients and show firstname, lastname and country-->
    <div class="container">
        <h2>Filterable Table</h2>
        <p>Type something in the input field to search the table for first names, last names or emails:</p>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>country</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php

                $query = "SELECT kundenid, firstname, lastname, country, email FROM kunde";
                
                $result = $db->query($query);
                    while($row = $result->fetch_assoc())
                    {   
                        //Creates a loop to loop through results
                        echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['country'] . "</td><td>" . $row['email'] . "</td></tr>";  //$row['kundenid'] the index here is a field name
                    }
                ?>
            </tbody>
        </table>

        <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
    </div>

    <?php 
    //mysql_close(); //Make sure to close out the database connection 
?>
    <!--Dynamic search when typing in tableview-->
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>

</html>