<?php


require_once(__DIR__ . '/Database/Connection.php');
use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

if (!$connection) {
    die("Connection failed: " );
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coverImage = $_POST["cover_image_url"];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $somethingAboutYou = $_POST["description"];
    $telephoneNumber = $_POST["phone_number"];
    $location = $_POST["location"];
    $type = $_POST["type"];
    $product1URL = $_POST["product1_url"];
    $product2URL = $_POST["product2_url"];
    $product3URL = $_POST["product3_url"];
    $product1Description = $_POST["product1_description"];
    $product2Description = $_POST["product2_description"];
    $product3Description = $_POST["product3_description"];
    $contactDescription = $_POST["description"];
    $linkedin = $_POST["linkedin_url"];
    $facebook = $_POST["facebook_url"];
    $twitter = $_POST["twitter_url"];
    $instagram = $_POST["instagram_url"];

    try {
        $sql = 'INSERT INTO websites (cover_image_url, title, subtitle, description, phone_number, location, type, product1_url, product2_url, product3_url, product1_description, product2_description, product3_description, contact_description, linkedin_url, facebook_url, twitter_url, instagram_url)
        VALUES (:coverImage, :title, :subtitle, :somethingAboutYou, :telephoneNumber, :location, :type, :product1URL, :product2URL, :product3URL, :product1Description, :product2Description, :product3Description, :contactDescription, :linkedin, :facebook, :twitter, :instagram)
        ';

        $statement = $connection->prepare($sql);

        $statement->bindParam(':coverImage', $coverImage, PDO::PARAM_STR);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
        $statement->bindParam(':somethingAboutYou', $somethingAboutYou, PDO::PARAM_STR);
        $statement->bindParam(':telephoneNumber', $telephoneNumber, PDO::PARAM_STR);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->bindParam(':product1URL', $product1URL, PDO::PARAM_STR);
        $statement->bindParam(':product2URL', $product2URL, PDO::PARAM_STR);
        $statement->bindParam(':product3URL', $product3URL, PDO::PARAM_STR);
        $statement->bindParam(':product1Description', $product1Description, PDO::PARAM_STR);
        $statement->bindParam(':product2Description', $product2Description, PDO::PARAM_STR);
        $statement->bindParam(':product3Description', $product3Description, PDO::PARAM_STR);
        $statement->bindParam(':contactDescription', $contactDescription, PDO::PARAM_STR);
        $statement->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $statement->bindParam(':facebook', $facebook, PDO::PARAM_STR);
        $statement->bindParam(':twitter', $twitter, PDO::PARAM_STR);
        $statement->bindParam(':instagram', $instagram, PDO::PARAM_STR);

        
        $statement->execute();
$connectionObj->destroy();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title >Webster</title>
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
    <style>
        .img-container{
    position: relative;
}
.img-container h1{
    position: absolute;
    top: 10%;
    left: 40%;
    color:black;
    font-size: 50px;
}
.img-container h2{
    position: absolute;
    top: 50%;
    left: 40%;
    color:black;
    font-size: 40px;

}
.nav li.nav-item:hover {
        background-color: lightgray; 
    }
    </style>
    
    
    
    </head>
    <body>
      <nav>
      <ul class="nav ">
     <li class="nav-item">
         <a class="nav-link active text-dark" href="#">Webster</a>
     </li>
     <li class="nav-item">
         <a class="nav-link active text-dark" href="#">Home</a>
     </li>
     <li class="nav-item">
         <a class="nav-link text-dark " href="#about-us">About Us</a>
     </li>
     <li class="nav-item">
         <a class="nav-link text-dark" href="#type"> <?php
            echo ucfirst($_POST['type']); ?></a>
     </li>
     <li class="nav-item">
         <a class="nav-link text-dark " href="#contact">Contact</a>
     </li>
 </ul>
      </nav>  

 <div class="container-fluid">
<div class="img-container ">
<img class="img-fluid w-100 h-50" src="<?php echo $coverImage; ?>" alt="Cover Image">
<h1 class="h1"><?php echo  $title  ?></h1>
<h2><?php echo   $subtitle  ?></h2>
</div>
</div>

<div class="text-center mt-3" id="about-us">
<h2>About us</h2>
<p class="text-center"><?php echo  $somethingAboutYou  ?></p>
<hr class="w-50">
<p>Tel: <?php echo  $telephoneNumber  ?></p>
<p>Location: <?php echo $location  ?></p>
</div>

<div class="container" id="type">
    <h4><?php echo     ucfirst($type)  ?></h4>
    <div class="row">
        <div class="col-4">
            <div class="card text-left">
              <img class="card-img-top" src="<?php echo $product1URL ?>" alt="">
              <div class="card-body bg-dark">
              <h4 class="card-title text-white"><?php echo ucfirst($type) . ' One Description'  ?></h4>
                <p class="card-text text-white"><?php echo  $product1Description ?></p>
                <p class="text-white">Last updated 3 mins ago</p>

            </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-left">
              <img class="card-img-top " src="<?php echo  $product2URL ?>" alt="">
              <div class="card-body bg-dark">
              <h4 class="card-title text-white"><?php echo ucfirst($type) . ' Two Description'  ?></h4>
                <p class="card-text text-white"><?php echo  $product2Description ?></p>
            <p class="text-white">Last updated 3 mins ago</p>
            </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-left">
              <img class="card-img-top" src="<?php echo  $product3URL ?>" alt="">
              <div class="card-body bg-dark">
              <h4 class="card-title text-white"><?php echo ucfirst($type) . ' Three Description'  ?></h4>

                <p class="card-text text-white"><?php echo  $product3Description ?></p>
                <p class="text-white">Last updated 3 mins ago</p>
  
            </div>
            </div>

        </div>
    </div>
</div>
<hr class="w-50">
<div class="container" id="contact">
    <div class="row">
        <div class="col-6">
            <h3>Contact</h3>
            <p><?php echo $contactDescription  ?></p>
        </div>
        <div class="col-6">
        <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div >
<p>Message:</p><textarea name="message" id="message" cols="75" rows="10">Write your message here</textarea>  </div>
</form>
<div class="text-center mt-3 mb-3">
<button type="submit " class="btn btn-info text-center ">Send</button>

</div>
</div>
    </div>
</div>
<footer class="bg-dark text-white text-center">Copyright by Sasho Gjorgjiev  <i class="fa fa-copyright" aria-hidden="true"></i>
<div>
<a href="<?php echo     $linkedin ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
<a href="<?php echo $facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>
<a href="<?php echo $twitter ?>" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="<?php echo $instagram ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</a>

</div>
</footer>

    </body>
</html>
