<?php
require_once(__DIR__ . '/Database/Connection.php');
use Database\Connection as Connection;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['registration_to'])) {
    $connectionObj = new Connection;
    $connection = $connectionObj->getConnection();
    $id = $_POST['id'];
    $newRegistrationTo = $_POST['registration_to'];

    $updateQuery = $connection->prepare('UPDATE vehicle_registration SET registration_to = ? WHERE id = ?');
    if ($updateQuery->execute([$newRegistrationTo, $id])) {
        header('Location: dashboard.php');
    } else {
        echo 'Error updating the registration date.';
    }
} else {
    echo 'Invalid request or missing data.';
}
?>
