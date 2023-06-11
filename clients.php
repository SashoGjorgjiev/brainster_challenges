<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $company = $_POST['company'];
  $email = $_POST['email'];
  $phone = $_POST['number'];
  $studentType = $_POST['student_type'];

  $servername = "127.1.1.0"; // Update with your server IP or hostname
  $username = "your_username"; // Replace with your database username
  $password = "your_password"; // Replace with your database password
  $dbname = "client_data";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO clients (name, company, email, phone, student_type)
          VALUES ('$name', '$company', '$email', '$phone', '$studentType')";

  if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
  } else {
    echo "Error submitting the form: " . $conn->error;
  }

  $conn->close();

  exit();
}
?>

<?php
$servername = "127.1.1.0"; // Update with your server IP or hostname
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "client_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

$table = '<table>';
$table .= '<thead><tr><th>Name</th><th>Company</th><th>Email</th><th>Phone</th><th>Student Type</th></tr></thead>';
$table .= '<tbody>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $table .= '<tr>';
    $table .= '<td>' . $row['name'] . '</td>';
    $table .= '<td>' . $row['company'] . '</td>';
    $table .= '<td>' . $row['email'] . '</td>';
    $table .= '<td>' . $row['phone'] . '</td>';
    $table .= '<td>' . $row['student_type'] . '</td>';
    $table .= '</tr>';
  }
} else {
  $table .= '<tr><td colspan="5">No clients found</td></tr>';
}

$table .= '</tbody></table>';

echo $table;

$conn->close();
?>
