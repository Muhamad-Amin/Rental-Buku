@extends('layouts.mainlayout')

@section('title', 'Edit Book')

@section('content')

    <h1>Edit Book</h1>

    <div class="my-5 w-50">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book's Code"
                    value="{{ $book->book_code }}" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's Title"
                    value="{{ $book->title }}" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Cover ( Image )</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display: block;">Current Cover</label>
                @if ($book->cover != null)
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="{{ $book->title }}" width="300px">
                @else
                    <img src="{{ asset('image/notFound.jpeg') }}" alt="Not Found" width="300px">
                @endif
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-select" aria-label="multiple select example"
                    multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($book->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </form>

    </div>

@endsection
