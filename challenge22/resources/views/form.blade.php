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
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <form method="post" action="/form" class=" p-4 ">
                    @csrf

                    <div class="mb-3">
                        @error('first_name')
                        <div class="bg-danger mt-2 ">
                            <p class="fs-4 text-light">{{ $message }}</p>
                        </div>
                        @enderror
                        <label for="first_name" class="form-label text-light fs-4">Name:</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">

                    </div>

                    <div class="mb-3">
                        @error('last_name')
                        <div class="bg-danger mt-2 ">
                            <p class="fs-4 text-light">{{ $message }}</p>
                        </div>
                        @enderror
                        <label for="last_name" class="form-label text-light fs-4">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">

                    </div>

                    <div class="mb-3">
                        @error('email')
                        <div class="bg-danger mt-2 ">
                            <p class="fs-4 text-light">{{ $message }}</p>
                        </div>
                        @enderror
                        <label for="email" class="form-label text-light fs-4">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">

                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3 ">Submit</button>

                </form>
            </div>

        </div>
    </div>

</body>

</html>