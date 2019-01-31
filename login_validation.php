<?php

//Build connection string
$host = 'localhost';
$user = 'root';
$password = 'password';
$db1 = 'db_webshop';

$db = new mysqli($host,$user,$password, $db1);

//get firstname and password from the input form
$username = $_POST["firstname"];

$pwd = $_POST["password_1"];

$sql = "SELECT kundenid, firstname, password_1 FROM kunde";

$result = $db->query($sql);
    //validate password and firstname.                      
   if ($result->num_rows > 0) {
                                
        while($row = $result->fetch_assoc()) {
                //the login password must match with the register password (Password is hashed with md5) 
                if($row["firstname"] == $username && $row["password_1"] == $pwd){
                    $kunde = $row["kundenid"];
                }
        }
   }

//Select und client id in order to validate it later on...
$sql1 = "SELECT kundenid, firstname, lastname, password_1 FROM kunde WHERE kundenid=" . $kunde;


$result1 = $db->query($sql1);
$row1 = $result1->fetch_assoc();

    //Error message if the account does not exist
    if($kunde == 0){
        echo "Account does not exist!";
    }else{
        echo "Welcome " . $row1["firstname"] . " " . $row1["lastname"];
        header("Location: index.php?kid=" . $kunde);
    }
?>