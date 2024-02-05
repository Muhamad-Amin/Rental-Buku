@extends('layouts.mainlayout')

{{-- Berhenti di menit ke 37.20 episode 7 untuk mencari internet --}}
@section('title', 'Category')

@section('content')

    <h1>Category List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/category-deleted" class="btn btn-secondary me-3">View deleted data</a>
        <a href="/category-add" class="btn btn-primary">Add Data</a>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="category-edit/{{ $item->slug }}" class="btn btn-primary">Edit</a>
                            <a href="category-delete/{{ $item->slug }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
