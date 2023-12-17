<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
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
        .hero-banner {
            position: relative;
            overflow: hidden;
            height: 50vh;
            width: 100%;
        }

        .hero-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.5;
        }

        .hero-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            z-index: 2;
        }

        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
</head>

<body>
    @extends('layout.layout')

    @section('title', 'Contact')

    @section('content')
    <div class="container-fluid w-100 m-0 p-0">

        <div class="row w-100">
            <div class="hero-banner w-100">
                <div class="dark-overlay w-100"></div>
                <img src="https://s26162.pcdn.co/wp-content/uploads/2020/10/rotary-phone.jpg" class="w-100 " alt="Hero Banner Image">
                <div class="hero-caption">
                    <h1 class="display-3 font-weight-bold">Contact me</h1>
                    <h4 class="font-weight-bold">Have question? I have answer</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 offset-3">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" class="form-control" id="number" name="number">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-square btn-info">SEND</button>
                </form>
            </div>
        </div>
    </div>


    @endsection

</body>

</html>