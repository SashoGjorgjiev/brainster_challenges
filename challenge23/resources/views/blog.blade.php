<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
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

    @section('title', 'Blog')

    @section('content')
    <div class="container-fluid w-100 m-0 p-0">

        <div class="row w-100">
            <div class="hero-banner w-100">
                <div class="dark-overlay w-100"></div>
                <img src="https://images.fineartamerica.com/images-medium-large-5/astronaut-holding-for-sale-sign-nasascience-photo-library.jpg" class="w-100 " alt="Hero Banner Image">
                <div class="hero-caption">
                    <h2 class="display-4 font-weight-bold">Man must explore,and this is exploration at it`s greates</h2>
                    <h4 class="font-weight-bold">Problems look mighty small from 150 miles up</h4>
                    <p>Posted by Start Bootstrap on December 17, 2023</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4 offset-4">
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto provident obcaecati saepe quod eveniet, laboriosam architecto nesciunt eligendi accusantium est facere commodi minus. Incidunt tempore, beatae amet non assumenda labore perferendis, corrupti et recusandae consequuntur quam commodi facilis nulla corporis provident voluptas iusto aspernatur sequi soluta laudantium dolorem a veniam. ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae vel voluptatibus impedit animi obcaecati similique error commodi doloribus quis repellendus.</p>
            <p class="text-justify pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi, atque excepturi ut aliquid similique eum possimus optio nulla hic? Molestiae odio laborum omnis dolorum ipsam porro quo, nihil perferendis?</p>
            <p class="text-justify pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi, atque excepturi ut aliquid similique eum possimus optio nulla hic? Molestiae odio laborum omnis dolorum ipsam porro quo, nihil perferendis?</p>
            <h3 class="my-4">The Final Frontier</h3>
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae vel voluptatibus impedit animi obcaecati similique Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo tempora tenetur illum incidunt officiis nisi iure facilis harum rerum ipsam. error commodi doloribus quis repellendus.</p>
            <p class="text-justify pt-4 text-muted">Lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto provident obcaecati saepe quod eveniet, laboriosam architecto nesciunt eligendi accusantium est facere commodi minus. Incidunt tempore, beatae amet non assumenda labore perferendis, corrupti et recusandae consequuntur quam commodi facilis nulla corporis provident voluptas iusto aspernatur sequi soluta laudantium dolorem a veniam. ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae vel voluptatibus impedit animi obcaecati similique error commodi doloribus quis repellendus.</p>
            <p class="text-justify pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi, atque excepturi ut aliquid similique eum possimus optio nulla hic? Molestiae odio laborum omnis dolorum ipsam porro quo, nihil perferendis?</p>
            <p class="text-justify pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et commodi, atque excepturi ut aliquid similique eum possimus optio nulla hic? Molestiae odio laborum omnis dolorum ipsam porro quo, nihil perferendis?</p>
            <h3 class="my-4">Reaching for the stars</h3>
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, repellendus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores laboriosam sequi, earum explicabo nulla! sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <img src="https://images.fineartamerica.com/images-medium-large-5/astronaut-holding-for-sale-sign-nasascience-photo-library.jpg" class="img-fluid" alt="">
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, repellendus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, repellendus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloribus esse numquam earum voluptatum inventore reiciendis non distinctio accusantium dolores? ipsum dolor sit amet consectetur, adipisicing elit. Cumque voluptas illum nam eius numquam, quae quisquam soluta molestias deleniti inventore fugiat dolor laudantium dignissimos optio fugit? Placeat ea sapiente possimus?</p>
            <p class="text-justify pt-4">Lorem Lorem <u>dignissimos optio fugit?</u> Placeat ea sapiente <u>possimus? Lorem, ipsum dolor. </u></p>

        </div>
    </div>
    <hr>

    @endsection

</body>

</html>