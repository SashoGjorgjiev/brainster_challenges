<?php



        use Database\Connection as Connection;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                require_once(__DIR__ . '/Database/Connection.php');
        
                $connectionObj = new Connection();
                $connection = $connectionObj->getConnection();
                $vehicle_type = isset($_POST['vehicle_type']) ? $_POST['vehicle_type'] : '';
                $vehicle_chassis_number = isset($_POST['vehicle_chassis_number']) ? $_POST['vehicle_chassis_number'] : '';
                $vehicle_production_year = isset($_POST['vehicle_production_year']) ? $_POST['vehicle_production_year'] : '';
                $registration_number = isset($_POST['registration_number']) ? $_POST['registration_number'] : '';
                $vehicle_model_id = isset($_POST['vehicle_model_id']) ? $_POST['vehicle_model_id'] : '';
                $fuel_type_id = isset($_POST['fuel_type_id']) ? $_POST['fuel_type_id'] : '';
                $registration_to = isset($_POST['registration_to']) ? $_POST['registration_to'] : '';
                $license_plate = $_POST['search'];
        
                $query = $connection->prepare("SELECT * FROM vehicle_registration WHERE registration_number = ?");
                $query->execute([$license_plate]);
        
                if ($query->rowCount() > 0) {
                    echo "<h3>Vehicle Information</h3>";
                    echo "<table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Vehicle Model</th>
                                    <th>Vehicle Type</th>
                                    <th>Chassis Number</th>
                                    <th>Production Year</th>
                                    <th>Registration Number</th>
                                    <th>Fuel Type</th>
                                    <th>Registration To</th>
                                </tr>
                            </thead>
                            <tbody>";
        
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$row['vehicle_model_id']}</td>
                                <td>{$row['vehicle_type']}</td>
                                <td>{$row['vehicle_chassis_number']}</td>
                                <td>{$row['vehicle_production_year']}</td>
                                <td>{$row['registration_number']}</td>
                                <td>{$row['fuel_type_id']}</td>
                                <td>{$row['registration_to']}</td>
                              </tr>";
                    }
        
                    echo "</tbody></table>";
                } else {
                    echo "<p style='color: red;'>No such record found.</p>";
                }
            } catch (PDOException $e) {
                die('Database error: ' . $e->getMessage());
            }
        }
        ?>
        