<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }
    </style>
</head>

<body>
    @extends('layout.layout')

    @section('title', 'About Me')

    @section('content')
    <div class="container-fluid w-100 m-0 p-0">

        <div class="row w-100">
            <div class="hero-banner w-100">
                <div class="dark-overlay w-100"></div>
                <img src="https://i.pinimg.com/736x/b6/88/45/b68845a212688ba060337267ba240746.jpg" class="w-100 " alt="Hero Banner Image">
                <div class="hero-caption">
                    <h1 class="display-3 font-weight-bold">Clean Blog</h1>
                    <h4 class="font-weight-bold">A Blog Theme by Start Bootstrap</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4 offset-4">
            <h4 class="text-justify pt-4 font-weight-bold">Lorem Ipsum</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, beatae possimus nesciunt distinctio voluptates sapiente porro itaque temporibus sed esse?</p>
            <span><i>Posted by <strong>John Doe</strong></i></span>
            <hr>
            <h4 class="text-justify pt-4 font-weight-bold">Lorem Ipsum 2</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, beatae possimus nesciunt distinctio voluptates sapiente porro itaque temporibus sed esse?</p>
            <span><i>Posted by <strong>John Doe</strong>in another boring new</i></span>
            <hr>
            <h4 class="text-justify pt-4 font-weight-bold">Lorem Ipsum 3</h4>
            <p class="font-weight-bold">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, dolores. ipsum dolor sit amet consectetur adipisicing elit. Illum, beatae possimus nesciunt distinctio voluptates sapiente porro itaque temporibus sed esse?</p>
            <span><i>Posted by <strong>John Doe</strong> </i></span>
            <hr>
            <h4 class="text-justify pt-4 font-weight-bold">Lorem Ipsum 4</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <span><i>Posted by <strong>Missy Doe</strong></i></span>
            <hr>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-square bg-info text-light ">Older posts -></button>
    </div>
    <hr>

    @endsection

</body>

</html>