<?php include('server.php');

?>
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
<body>
    <div class="container">
        <h1>Registration</h1>
        <form class="form-horizontal" method="post" action="register.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstname">Firstname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname" name="firstname">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lastname">Lastname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname" name="lastname">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="age">age</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="age" placeholder="Enter your age (optional)" name="age">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="gender" placeholder="Enter your gender (optional)" name="gender">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="street">street</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="street" placeholder="Enter you street" name="street">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="location">location</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="location" placeholder="Enter your location (canton, state or province)" name="location">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="zip">zip</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="zip" placeholder="Enter your zip code" name="zip">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="country">country</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter a valid email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="year">year</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="year" placeholder="Enter your birth date (optional)" name="year">
                </div>
            </div>
            <hr />
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pwd_1" placeholder="Enter your new password" name="password_1">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Confirm password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pwd_2" placeholder="Confirm Password" name="password_2">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-success">Register</button>
                </div>
            </div>
            <p>Already a member? <a href="login.php">Log in</p>
        </form>
    </div>    
</body>
</html>