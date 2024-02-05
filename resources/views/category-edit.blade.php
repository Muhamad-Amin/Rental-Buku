@extends('layouts.mainlayout')

@section('title', 'Edit Category')

@section('content')

    <h1>Edit category</h1>

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

        <form action="/category-edit/{{ $category->slug }}" method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name"
                    value="{{ $category->name }}" autocomplete="off">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>

        </form>

    </div>

@endsection
