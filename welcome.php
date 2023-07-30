<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        echo "<h1>Welcome $username</h1>";
    } else {
        echo "<h1>Welcome</h1>";
    }
    ?>
</body>
</html>
