<?php include('server.php');?>

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
        <form class="form-horizontal" method="post" action="sign_up.php">
            <!-- display validation errors-->
            <?php
                include('errors.php');
            ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstname">Firstname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your firstname" name="firstname" value="<?php echo $firstname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lastname">Lastname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your lastname" name="lastname" value="<?php echo $lastname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="age">age</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="Enter your age (optional)" name="age" value="<?php echo $age; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your gender (optional)" name="gender" value="<?php echo $gender ; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="street">street</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter you street" name="street" value="<?php echo $street; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="location">location</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your location (canton, state or province)" name="location" value="<?php echo $location; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="zip">zip</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="Enter your zip code" name="zip" value="<?php echo $zip; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="country">country</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your country" name="country" value="<?php echo $country; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" placeholder="Enter a valid email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="year">year</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter your birth date (optional)" name="year" value="<?php echo $year; ?>">
                </div>
            </div>
            <hr />
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control"  placeholder="Enter your new password" name="password_1">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Confirm password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_2">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="register">Register</button>
                </div>
            </div>
            <p>Already a member? <a href="login.php">Log in</p>
        </form>
    </div>    
</body>
</html>