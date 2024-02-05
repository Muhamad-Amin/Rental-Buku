@extends('layouts.mainlayout')

@section('title', 'Books')

@section('content')

    <h1>Book List</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="/book-deleted" class="btn btn-secondary me-3">View deleted data</a>
        <a href="/book-add" class="btn btn-primary">Add Data</a>
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
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <ol>
                                @foreach ($item->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $item->slug }}" class="btn btn-primary">Edit</a>
                            <a href="/book-delete/{{ $item->slug }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
