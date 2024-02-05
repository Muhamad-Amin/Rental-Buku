@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')

    <h1>User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/users-banned" class="btn btn-secondary me-3">View Banned Users</a>
        <a href="/registered-users" class="btn btn-primary">New Registered Users</a>
    </div>

    @if (Session('status'))
        <div class="alert alert-success my-5" role="alert">
            {{ Session('status') }}
        </div>
    @endif

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-primary">Detail</a>
                            <a href="/user-ban/{{ $item->slug }}" class="btn btn-danger">ban user</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
