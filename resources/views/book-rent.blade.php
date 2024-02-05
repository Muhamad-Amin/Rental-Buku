@extends('layouts.mainlayout')

@section('title', 'Book Rent')

@section('content')

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">

        <h1 class="mb-5">Book Rent Form</h1>

        @if (Session('message'))
            <div class="alert {{ Session('alert-class') }} my-5" role="alert">
                {{ Session('message') }}
            </div>
        @endif

        <form action="" method="post">
            @csrf

            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control">
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="book" class="form-label">Book</label>
                <select name="book_id" id="book" class="form-control">
                    @foreach ($books as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-25">Submit</button>
            </div>

        </form>
    </div>

@endsection
