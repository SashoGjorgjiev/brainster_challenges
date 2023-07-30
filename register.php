<?php
include_once('functions.php');
$error = '';
$error2 = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username'])) {
        $error2 = 'Username is required.';
    } elseif (!isValidUsername($_POST['username'])) {
        $error2 = 'Username cannot contain empty spaces or special signs.';
    } elseif (empty($_POST['email'])) {
        $error2 = 'Email is required.';
    } elseif (!isValidEmail($_POST['email'])) {
        $error2 = 'Invalid email format. Email must have at least 5 characters before @.';
    } elseif (empty($_POST['password'])) {
        $error2 = 'Password is required.';
    } elseif (!isValidPassword($_POST['password'])) {
        $error2 = 'Invalid password format. Password must have at least one number, one special sign, and one uppercase letter.';
    } elseif (!usernameUnique($_POST['username'])) {
        $error = 'Username is already taken. Please choose a different username.';
    } elseif (!emailUnique($_POST['email'])) {
        $error = 'A user with this email already exists. Please use a different email.';
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userData = "$username=$hashedPassword";
        $userEmailData = "$email,$username=$hashedPassword";

        file_put_contents('users.txt', $userData . PHP_EOL, FILE_APPEND);
        file_put_contents('usersEmail.txt', $userEmailData . PHP_EOL, FILE_APPEND);

        header("Location: welcome.php?username=" . urlencode($username));
        exit();
    }
}
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
        height:100%;
        background-color:green;
        color:white;
        font-size:20px;
        cursor:pointer;
        margin-top: 30px;
    }
    .error-message {
        color:#ffc107;
    }
    .error-message2 {
            color: red;
        }
</style>
</head>
<body>
    <h1>Sign up form</h1>
   <?php  if(!empty($error)) :        ?>
    <p class="error-message"><?php echo $error;?></p>
    <?php endif; ?>
 
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
<label for="password">Password:</label>
<input type="password" name="password" id="password">
<br>
<label for="email">E-mail:</label>
<input type="text" name="email" id="email">
<br>

<button type="submit">Submit</button>
<?php  if(!empty($error2)) :        ?>
    <p class="error-message2"><?php echo $error2;?></p>
    <?php endif; ?>
    </form>
</body>
</html>