<?php

require_once(__DIR__ . '/Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection;
$connection = $connectionObj->getConnection();

if (isset($_POST['id'])) {
    $statement = $connection->prepare('DELETE FROM vehicle_registration where id=:id');
    $statement->bindParam(":id", $_POST['id']);
    $statement->execute();
    header('Location: dashboard.php');
} else {
    header('Location: dashboard.php?Something%20Went%20wrong');
}
