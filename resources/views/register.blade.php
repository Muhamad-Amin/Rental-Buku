<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}">
    <title>Rental Buku | Registrasi</title>
    <style>
        .main {
            height: 100vh;
        }

        .register-box {
            width: 500px;
            border: 1px solid rgba(0, 0, 0, 1);
            padding: 30px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="main d-flex justify-content-center align-items-center flex-column">

        @if ($errors->any())
            <div class="alert alert-danger" style="width:500px;">
                <ul>
                    B;@foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('status'))
            <div class="alert alert-success" role="alert" style="width: 500px;">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="register-box">
            <form action="" method="post">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control" style="resize: none;">
                    </textarea>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-50">Register</button>
                </div>

                <div class=" text-center">
                    <a href="/login" class="btn btn-outline-success w-50">Have account? Login</a>
                </div>

            </form>
        </div>
    </div>

    <script src="{{ asset('asset/bootstrap-5.2.3-dist/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
