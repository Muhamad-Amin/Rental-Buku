@extends('layouts.mainlayout')

@section('title', 'View deleted Books')

@section('content')

    {{-- {{ $deletedCategory }} --}}

    <h1>Deleted Books List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/categories" class="btn btn-primary">Back</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedBooks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <th>{{ $item->title }}</th>
                        <th>
                            <ol>
                                @foreach ($item->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ol>
                        </th>
                        <td>
                            <a href="/book-restore/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
