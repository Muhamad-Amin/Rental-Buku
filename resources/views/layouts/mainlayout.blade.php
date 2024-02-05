<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mainlayouts.css') }}">
    <title>Rental Buku | @yield('title')</title>
</head>

<body>

    <div class="main d-flex justify-content-between flex-column">
        @include('layouts.navbarlayout')

        <div class="body-content h-100">
            <div class="row g-0 h-100">

                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    @if (Auth::user())

                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>
                                Dashboard
                            </a>
                            <a href="/books" @if (request()->route()->uri == 'books' ||
                                    request()->route()->uri == 'book-add' ||
                                    request()->route()->uri == 'book-deleted' ||
                                    request()->route()->uri == 'book-edit/{slug}' ||
                                    request()->route()->uri == 'book-delete/{slug}') class="active" @endif>
                                Books
                            </a>
                            <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-deleted' ||
                                    request()->route()->uri == 'category-edit/{slug}' ||
                                    request()->route()->uri == 'category-delete/{slug}') class="active" @endif>
                                Categories
                            </a>
                            <a href="/users" @if (request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'registered-users' ||
                                    request()->route()->uri == 'user-detail/{slug}' ||
                                    request()->route()->uri == 'user-ban/{slug}' ||
                                    request()->route()->uri == 'users-banned') class="active" @endif>
                                Users
                            </a>
                            <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class="active" @endif>
                                Rent Log
                            </a>
                            <a href="/public" @if (request()->route()->uri == 'public') class="active" @endif>
                                Book List
                            </a>
                            <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class="active" @endif>Book Rent</a>
                            <a href="rent-return" @if (request()->route()->uri == 'rent-return') class="active" @endif>
                                Book Return
                            </a>
                            <a href="/logout">Logout</a>
                        @else
                            <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>
                                Profile
                            </a>
                            <a href="/public" @if (request()->route()->uri == 'public') class="active" @endif>
                                Book List
                            </a>
                            <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>

                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('asset/bootstrap-5.2.3-dist/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
