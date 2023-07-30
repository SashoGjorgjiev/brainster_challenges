<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $usersDataString = file_get_contents('users.txt');
        $userFound = false;

        if ($usersDataString !== false) {
            $usersData = explode(PHP_EOL, $usersDataString);

            foreach ($usersData as $userData) {
                if (strpos($userData, '=') !== false) {
                    list($storedUsername, $hashedPassword) = explode('=', $userData);

                    if ($storedUsername === $username && password_verify($password, $hashedPassword)) {
                        header("Location: welcome.php?username=" . urlencode($username));
                        exit();
                    } else{
                        header('Location:login_handler.php?Wrong%20Username%20Password%20Combination');
                    }
                }
            }
        }
        }
    }
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        echo "<h1>Welcome $username</h1>";
    } else {
        echo "<h1>Wrong Username and password combination</h1>";
    }



?>