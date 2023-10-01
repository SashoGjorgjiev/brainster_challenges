<?php
session_start();
require_once(__DIR__ . '/Database/Connection.php');

$connectionObj = new \Database\Connection();
$connection = $connectionObj->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user &&  $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: dashboard.php');
        exit();
    } else {
        echo "Invalid username or password.";
    }

}
?>
