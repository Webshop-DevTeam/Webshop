<?php

$host = 'localhost';
$user = 'root';
$password = 'password';
$db1 = 'db_webshop';

$db = new mysqli($host,$user,$password, $db1);


$username = $_POST["firstname"];

$pwd = $_POST["password_1"];

$sql = "SELECT kundenid, firstname, password_1 FROM kunde";

$result = $db->query($sql);
                            
   if ($result->num_rows > 0) {
                                
        while($row = $result->fetch_assoc()) {

                if($row["firstname"] == $username && $row["password_1"] == $pwd){
                    $kunde = $row["kundenid"];
                    
                }
        }
   }


$sql1 = "SELECT kundenid, firstname, lastname, password_1 FROM kunde WHERE kundenid=" . $kunde;


$result1 = $db->query($sql1);
$row1 = $result1->fetch_assoc();

if($kunde == 0){
    echo "Account does not exist!";
}else{
    echo "Welcome " . $row1["firstname"] . " " . $row1["lastname"];
    header("Location: index.php?kid=" . $kunde);

}






?>