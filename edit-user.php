
<?php
require_once(__DIR__ . '/Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection;
$connection = $connectionObj->getConnection();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $checkQuery = $connection->prepare('SELECT COUNT(*) FROM vehicle_registration WHERE id = ?');
    $checkQuery->execute([$id]);
    $count = $checkQuery->fetchColumn();

    if ($count > 0) {

        $vehicle_type = $_POST['vehicle_type'] ? $_POST['vehicle_type'] : '';
        $vehicle_chassis_number = $_POST['vehicle_chassis_number'] ? $_POST['vehicle_chassis_number'] : '';
        $vehicle_production_year = $_POST['vehicle_production_year'] ? $_POST['vehicle_production_year'] : '';
        $registration_number = $_POST['registration_number'] ? $_POST['registration_number'] : '';
        $registration_to = $_POST['registration_to'] ? $_POST['registration_to'] : '';

        $statement = $connection->prepare('UPDATE vehicle_registration SET 
            vehicle_type = :vehicle_type,
            vehicle_chassis_number = :vehicle_chassis_number,
            vehicle_production_year = :vehicle_production_year,
            registration_number = :registration_number,
            registration_to = :registration_to
            WHERE id = :id');

        $statement->bindParam(":id", $id);
        $statement->bindParam(":vehicle_type", $vehicle_type);
        $statement->bindParam(":vehicle_chassis_number", $vehicle_chassis_number);
        $statement->bindParam(":vehicle_production_year", $vehicle_production_year);
        $statement->bindParam(":registration_number", $registration_number);
        $statement->bindParam(":registration_to", $registration_to);
        $statement->execute();

        header('Location: dashboard.php');
    } else {
        header('Location: dashboard.php?error=Invalid%20ID');
    }
} else {
    header('Location: dashboard.php?Something%20Went%20wrong');
}
