<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Page</title>
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
                <a href="" class="btn btn-light">LOG IN</a>
                <span class="mx-2 border-left border-light"></span>

                <form method="post" action="/" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light">LOG OUT</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container text-light">
        <h1>Information Page</h1>
        <h2>Your Name is: {{ session('first_name') }}</h2>
        <h2>Your Last Name: {{ session('last_name') }}</h2>
        @if(session('email'))
        <h2>Your Email is: {{ session('email') }}</h2>
        @endif

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