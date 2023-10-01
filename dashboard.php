<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
require_once(__DIR__ . '/Database/Connection.php');

$connectionObj = new \Database\Connection();
$connection = $connectionObj->getConnection();

$modelOptions = [];

$modelQuery = $connection->query("SELECT * FROM vehicle_models");
if ($modelQuery) {
    $modelOptions = $modelQuery->fetchAll(PDO::FETCH_ASSOC);
}

$fuelOptions = [];

$fuelQuery = $connection->query("SELECT * FROM fuel_types");
if ($fuelQuery) {
    $fuelOptions = $fuelQuery->fetchAll(PDO::FETCH_ASSOC);
}

$vehicleTypeOptions = ['sedan', 'coupe', 'hatchback', 'suv', 'minivan'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Vehicle Registration</a>
        <form class="form-inline" method="post" action="logout.php">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </nav>
    <div class="container">
        <h1 class="text-center">Vehicle Registration Form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="two-column-form">
            <div class="row">

                <div class="col-6">

                    <div class="form-group">
                        <label for="vehicle_model">Vehicle Model:</label> <br>
                        <select name="vehicle_model_id" id="vehicle_model" class="form-control">
                            <?php foreach ($modelOptions as $model) : ?>
                                <option value="<?= $model['id'] ?>"><?= $model['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_chassis_number">Vehicle Chassis Number:</label>
                        <input type="text" name="vehicle_chassis_number" id="vehicle_chassis_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="registration_number">Registration Number:</label>
                        <input type="text" name="registration_number" id="registration_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="registration_to">Registration To:</label>
                        <input type="date" name="registration_to" id="registration_to" class="form-control">
                    </div>
                </div>

                <div class="col-6">

                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type:</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-control">
                            <?php foreach ($vehicleTypeOptions as $type) : ?>
                                <option value="<?= $type ?>"><?= $type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_production_year">Vehicle Production Year:</label>
                        <input type="date" name="vehicle_production_year" id="vehicle_production_year" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="fuel_type">Fuel Type:</label>
                        <select name="fuel_type_id" id="fuel_type_id" class="form-control">
                            <?php foreach ($fuelOptions as $fuel) : ?>
                                <option value="<?= $fuel['id'] ?>"><?= $fuel['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php

    $vehicle_type = isset($_POST['vehicle_type']) ? $_POST['vehicle_type'] : '';
    $vehicle_chassis_number = isset($_POST['vehicle_chassis_number']) ? $_POST['vehicle_chassis_number'] : '';
    $vehicle_production_year = isset($_POST['vehicle_production_year']) ? $_POST['vehicle_production_year'] : '';
    $registration_number = isset($_POST['registration_number']) ? $_POST['registration_number'] : '';
    $registration_to = isset($_POST['registration_to']) ? $_POST['registration_to'] : '';
    $vehicle_model_id = isset($_POST['vehicle_model_id']) ? $_POST['vehicle_model_id'] : '';
    $fuel_type_id = isset($_POST['fuel_type_id']) ? $_POST['fuel_type_id'] : '';

    $query = $connection->prepare("SELECT COUNT(*) FROM vehicle_registration WHERE vehicle_chassis_number = ?");
    $query->execute([$vehicle_chassis_number]);
    $count = $query->fetchColumn();

    if ($count > 0) {
        echo "<h5 style='color: red;'>Chassis Number already exists in the database.</h5>";
    } else {

        $vehicle_type = isset($_POST['vehicle_type']) ? $_POST['vehicle_type'] : '';
        $vehicle_chassis_number = isset($_POST['vehicle_chassis_number']) ? $_POST['vehicle_chassis_number'] : '';
        $vehicle_production_year = isset($_POST['vehicle_production_year']) ? $_POST['vehicle_production_year'] : '';
        $registration_number = isset($_POST['registration_number']) ? $_POST['registration_number'] : '';
        $registration_to = isset($_POST['registration_to']) ? $_POST['registration_to'] : '';

        try {
            $insertQuery = $connection->prepare("INSERT INTO vehicle_registration (vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, registration_to, vehicle_model_id, fuel_type_id) VALUES (?, ?, ?, ?, ?, ?, ?)");

            $insertQuery->bindParam(1, $vehicle_type);
            $insertQuery->bindParam(2, $vehicle_chassis_number);
            $insertQuery->bindParam(3, $vehicle_production_year);
            $insertQuery->bindParam(4, $registration_number);
            $insertQuery->bindParam(5, $registration_to);
            $insertQuery->bindParam(6, $vehicle_model_id);
            $insertQuery->bindParam(7, $fuel_type_id);

            $insertQuery->execute();

            echo "<h5 style='color: green;'>Registration successful!</h5>";
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }






    ?>
    <form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input class="form-control ml-auto mr-2" type="text" name="search_query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">Search</button>
    </form>
    <?php
    if (isset($_POST['search'])) {
        $searchQuery = $_POST['search_query'];

        $search = "SELECT 
                vr.*, 
                vm.name AS vehicle_models_name, 
                vt.name AS fuel_types_name 
              FROM 
                vehicle_registration vr
              LEFT JOIN 
                vehicle_models vm ON vr.vehicle_model_id = vm.id
              LEFT JOIN 
                fuel_types vt ON vr.fuel_type_id = vt.id
              WHERE 
                vr.vehicle_model_id LIKE :search_query
                OR vr.registration_number LIKE :search_query
                OR vr.vehicle_chassis_number LIKE :search_query";

        $stmt = $connection->prepare($search);
        $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();

        $licensedVehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    ?>
    <?php
    $query = "SELECT 
vr.*, 
vm.name AS vehicle_models_name, 
vt.name AS fuel_types_name 
FROM 
vehicle_registration vr
LEFT JOIN 
vehicle_models vm ON vr.vehicle_model_id = vm.id
LEFT JOIN 
fuel_types vt ON vr.fuel_type_id = vt.id";
    try {
        $stmt = $connection->query($query);

        $licensedVehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">vehicle_model</th>
                <th scope="col">vehicle_type</th>
                <th scope="col">vehicle_chassis_number</th>
                <th scope="col">vehicle_production_year</th>
                <th scope="col">registration_number</th>
                <th scope="col">fuel_type</th>
                <th scope="col">registration_to</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($licensedVehicles as $vehicle) : ?>
                <?php



                $currentDate = new DateTime();
                $registrationToDate = new DateTime($vehicle['registration_to']);
                $diff = $currentDate->diff($registrationToDate);

                $rowClass = '';
                if ($diff->days < 30) {
                    $rowClass = 'table-warning';
                } elseif ($currentDate > $registrationToDate) {
                    $rowClass = 'table-danger';
                }
                ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= $vehicle['id'] ?></td>
                    <td><?= $vehicle['vehicle_models_name'] ?></td>
                    <td><?= $vehicle['vehicle_type'] ?></td>
                    <td><?= $vehicle['vehicle_chassis_number'] ?></td>
                    <td><?= $vehicle['vehicle_production_year'] ?></td>
                    <td><?= $vehicle['registration_number'] ?></td>
                    <td><?= $vehicle['fuel_types_name'] ?></td>
                    <td><?= $vehicle['registration_to'] ?></td>
                    <form action="edit-user.php" method="POST">
                        <td>
                            <input type="hidden" name="id" value="<?= $vehicle['id'] ?>">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </td>
                    </form>
                    <form action="delete-user.php" method="POST">
                        <td> <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $vehicle['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                    </form>
                    <td>
                        <?php
                        if ($rowClass === 'table-warning' || $rowClass === 'table-danger') {
                            echo '<a href="extend.php?id=' . $vehicle['id'] . '" class="btn btn-success btn-sm">Extend</a>';
                        }
                        ?>
                    </td>
                    </td>
                <?php endforeach; ?>
        </tbody>
    </table>












    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>