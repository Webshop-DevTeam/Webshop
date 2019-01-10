<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Registration</h1>

    <form method="post" action="register.php">
        <div class="input_group">
            <label>Firstname</label>
            <input type="text" name="firstname">
        </div>
        <div class="input_group">
            <label>Lastname</label>
            <input type="text" name="lastname">
        </div>
        <div class="input_group">
            <label>age</label>
            <input type="number" name="age">
        </div>
        <div class="input_group">
            <label>gender</label>
            <input type="text" name="gender">
        </div>
        <div class="input_group">
            <label>street</label>
            <input type="text" name="street">
        </div>
        <div class="input_group">
            <label>location</label>
            <input type="text" name="location">
        </div>
        <div class="input_group">
            <label>zip</label>
            <input type="number" name="zip">
        </div>
        <div class="input_group">
            <label>country</label>
            <input type="text" name="country">
        </div>
        <div class="input_group">
            <label>email</label>
            <input type="email" name="email">
        </div>
        <div class="input_group">
            <label>year</label>
            <input type="text" name="year">
        </div>
        <hr />
        <div class="input_group">
            <label>password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input_group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input_group">
            <button type="submit" name="Register" class="btn">
        </div>
    </form>
</body>
</html>