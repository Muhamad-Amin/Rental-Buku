@extends('layouts.mainlayout')

@section('title', 'Dasboard')

@section('content')

    <h1>Welcome {{ Auth::user()->username }}</h1>

    <div class="row my-5">

        <div class="col-lg-4 py-2">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-bookmark"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-center text-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">
                            {{ $book_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 py-2">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-task"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                            <path
                                d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                            <path fill-rule="evenodd"
                                d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                        </svg>
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-center text-end">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">
                            {{ $category_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 py-2">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people"
                            viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-center text-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">
                            {{ $user_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="mt-5">
        <h2>#Rent Log</h2>
        <x-rent-log-table :rentLog='$rent_logs'></x-rent-log-table>
    </div>

@endsection
