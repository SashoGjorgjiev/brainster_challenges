<?php
require_once(__DIR__ . '/Database/Connection.php');
use Database\Connection as Connection;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $connectionObj = new Connection;
    $connection = $connectionObj->getConnection();
    $id = $_GET['id'];

    $checkQuery = $connection->prepare('SELECT * FROM vehicle_registration WHERE registration_to = ?');
    $checkQuery->execute([$id]);
    $vehicle = $checkQuery->fetch(PDO::FETCH_ASSOC);

    if ($vehicle) {
        echo '<form action="update-registration.php" method="POST">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<label for="registration_to">New Registration To Date:</label>';
        echo '<input type="date" name="registration_to" id="registration_to" value="' . $vehicle['registration_to'] . '">';
        echo '<button type="submit">Extend Registration</button>';
        echo '</form>';
    } else {
        echo 'Record not found.';
    }
} else {
    echo 'Invalid request or missing ID.';
}
