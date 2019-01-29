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
    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $db1 = 'db_webshop';

    $db = new mysqli($host,$user,$password, $db1);

    if($kunde != null){
    $sql2= "SELECT kundenid, firstname FROM kunde WHERE kundenid=" . $kunde;

    //table
    $result = mysql_query($query);
?>

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
        while($row = mysql_fetch_array($result))
        {   
            //Creates a loop to loop through results
            echo "<tr><td>" . $row['firstname'] . "</tr><td>" . $row['lastname'] . "</tr></td>" . $row['country'] . "</tr></td>" . $row['email'];  //$row['index'] the index here is a field name
        }
    ?>

            </tbody>
        </table>

        <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
    </div>

    <?php 
    mysql_close(); //Make sure to close out the database connection 
?>

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