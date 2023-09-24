<!DOCTYPE html>
<html>
<head>
    <title>Second Page</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
<style>
    body {
        background-image: url(https://i.pinimg.com/originals/bf/2b/33/bf2b33643ab3d0ff00505a35434996fb.jpg);
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: cover;
   }
</style>

</head>
<body>
    <h2 class="text-center m-3">You are one step away from your webpage</h2>
    <div class="container">
        <form action="page-3.php" method="POST">
            <div class="row">
                <div class="col-3 border   rounded">
                    <label class="pt-3" for="cover-image ">Cover image URL</label>
                    <input  type="text" name="cover_image_url" id="cover_image_url" required>
                    <label class="pt-3" for="title">Main Title of Page</label>
                    <input type="text" name="title" id="title" required>
                    <label class="pt-3" for="subtitle">Subtitle Of Page</label>
                    <input type="text" name="subtitle" id="subtitle" required>
                    <label class="pt-3" for="description	">Something about you</label>
                    <textarea name="description" id="description	" required></textarea> <br>
                    <label class="pt-3" for="number">Your telephone number</label>
                    <input type="number" id="number" name="phone_number" required> <br>
                    <label class="pt-3" for="location">Location</label> <br>
                    <input type="text" name="location" id="location" required>
                </div>
                <div class="col-3 offset-1 border rounded">
                    <h6>Provide url for an image and description of your service/products</h6>
                    <label for="image-url1">Image URL</label>
                    <input type="text" name="product1_url" id="image-url1" required>
                    <label for="description1">Description of service/product</label>
                    <textarea name="product1_description" id="description1" required></textarea> <br>
                    <label for="image-url2">Image URL</label>
                    <input type="text" name="product2_url" id="image-url2 required">
                    <label for="description2">Description of service/product</label>
                    <textarea name="product2_description" id="description2" required></textarea> <br>
                    <label for="image-url3">Image URL</label>
                    <input type="text" name="product3_url" id="image-url3 required">
                    <label for="description3">Description of service/product</label>
                    <textarea name="product3_description" id="description3" required></textarea>
                </div>
                <div class="col-3 offset-1 border rounded">
                    <h6>Provide a description of your company, something people should be aware of before they contact you:</h6>
                    <textarea name="description" id="description-company" required></textarea>
                    <hr>
                    <label class="pt-3" for="linkedin">Linkedin</label><br>
                    <input type="text" name="linkedin_url" id="linkedin" required> 
                    <label class="pt-3" for="facebook">Facebook</label>
                    <input type="text" name="facebook_url" id="facebook" required> <br>
                    <label class="pt-3" for="twitter">Twitter</label> <br>
                    <input type="text" name="twitter_url" id="twitter" required>
                    <label  class="pt-3"  for="google">Google+</label>
                    <input type="text" name="instagram_url" id="google" required>
                </div>
            </div>
            <div class="mt-5 border rounded">
                <div class="w-25">
                    <label for="sop">Do you provide services or products</label>
                    <br>
                    <select name="type" id="serviceOrProductSelect" class="m-3 px-3" >
             <?php
require_once(__DIR__ . '/Database/Connection.php');
use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

    $sql = "SELECT DISTINCT type FROM websites";

    $stmt = $connection->query($sql);
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $type = $row['type'];
            echo "<option value='$type'>$type</option>";
        }
    }

?>
                    </select>
                </div>
            </div>
            <button class="submit mt-5 ml-5 mb-5 w-75 btn bg-dark text-light">Submit</button>
        </form>
    </div>
</body>
</html>
