<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url("https://assets.bonappetit.com/photos/5c366551f212512d0e6cefd0/16:9/w_2560%2Cc_limit/Basically-Coffee-0219-03.jpg");
            background-size: cover;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>

    <h1 class="text-center font-weight-bold text-light mt-5">BUSSINESS CASUAL</h1>
    <div class="container-fluid">
        <div class="col-12 h-25 bg-dark p-2">
            <div class="text-center ">
                <a href="home" class="btn btn-light">HOME</a>
                <span class="mx-2 border-left border-light"></span>
                <a href="form" class="btn btn-light">LOG IN</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">

            <div class="col-md-6 mt-5 bg-light position-relative">
                <div class="w-100 h-100 px-0 opacity-50">
                    <h4 class="text-dark font-weight-bold">LOREM IPSUM</h4>
                    <h1 class="text-dark font-weight-bold">LOREM IPSUM</h1>
                    <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum dolores praesentium dolorum sed tempore corrupti maiores illum magni, eius quaerat natus aliquid neque nostrum expedita doloribus ratione non aut provident.</h5>
                </div>
                <div class="font-weight-bold position-absolute top-10 bottom-10 end-50  mb-0 ">
                    <a href="" class="btn btn-warning pt-3">Visit us today</a>
                </div>
            </div>

            <div class="col-md-6 mt-5 d-flex px-0">
                <img class="w-100 h-100" src="https://www.thesun.co.uk/wp-content/uploads/2023/09/2021-people-able-dine-restaurants-653490617-1.jpg" alt="">
            </div>

        </div>
    </div>

    <div class="container-fluid my-5 bg-warning">
        <div class="row ">
            <div class="col-6 offset-3 my-3 text-center border border-3 bg-light border-danger ">
                <h3>Our promise</h3>
                @if(session('first_name') && session('last_name'))
                <h2>TO {{ session('first_name') }} {{ session('last_name') }}</h2>
                @else <h2>TO </h2>
                @endif
                <div class="text-justify">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem quam iure tenetur. Molestiae doloribus aspernatur ipsa explicabo qui sequi. Quod maiores, qui, deserunt, obcaecati sequi excepturi reiciendis vitae voluptatem ad sunt mollitia quis optio incidunt animi non iusto velit illum. Molestiae tempora, officia vitae aspernatur dolorum id sunt pariatur fuga.</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus officia, beatae sint repellat commodi odit nisi iure nobis? Harum.
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="row text-light text-center">
            <footer>
                <h3>Copyright &copy; Your Website 2023</h3>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>