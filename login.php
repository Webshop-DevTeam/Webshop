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
        <h1>Log in</h1>
        <form class="form-horizontal" method="post" action="login.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstname">Firstname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname" name="firstname">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pwd_1" placeholder="Enter your new password" name="password_1">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-success">login</button>
                </div>
            </div>
            <p>Not yet a member? <a href="sign_up.php">Sign up</p>
</body>
</html>