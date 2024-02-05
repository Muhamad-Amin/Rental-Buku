<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}">
    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .login-box {
            width: 500px;
            border: 1px solid rgba(0, 0, 0, 1);
            padding: 30px;
            border-radius: 6px;
        }
    </style>
    <title>Rental Buku | Login</title>
</head>

<body>

    <div class="main d-flex justify-content-center align-items-center flex-column">
        @if (Session::has('status'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="login-box">
            <form action="" method="post">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off"
                        required>
                </div>

                <div class="mb-3 text-center">
                    <a href="/public" class="btn btn-outline-success mx-2">Books</a>
                    <button type="submit" class="btn btn-primary w-50">Login</button>
                </div>

                <div class=" text-center">
                    Don't have account? <a href="/register">Sign Up</a>
                </div>

            </form>
        </div>
    </div>

    <script src="{{ asset('asset/bootstrap-5.2.3-dist/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
