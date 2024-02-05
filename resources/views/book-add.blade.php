@extends('layouts.mainlayout')

@section('title', 'Add Book')

@section('content')
    {{-- <link href="path/to/select2.min.css" rel="stylesheet" />
    <script src="path/to/select2.min.js"></script> --}}
    {{-- perbaiki di menit 1.20.20 untuk mencari internet --}}

    <h1>Add new Book</h1>

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

        <form action="/book-add" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book's Code"
                    value="{{ old('book_code') }}" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's Title"
                    value="{{ old('title') }}" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Cover ( Image )</label>
                <input type="file" name="image" id="image" class="form-control">
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
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </form>

    </div>

@endsection
