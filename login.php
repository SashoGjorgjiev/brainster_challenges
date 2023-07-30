<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<style>
    form input {
        margin-bottom: 10px;

    }
    label {
        font-size:25px;

    }
    button {
        width:20%;
      background-color:green;
        color:white;
        font-size:20px;
        cursor:pointer;
        margin-top: 30px;
    }
</style>
</head>
<body>
    <h1>Login form</h1>
   
    <form action="login_handler.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
<label for="password">Password:</label>
<input type="password" name="password" id="password">
<br>

<button type="submit">Submit</button>
    </form>
</body>
</html>