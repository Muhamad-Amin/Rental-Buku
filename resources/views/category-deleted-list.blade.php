@extends('layouts.mainlayout')

@section('title', 'View deleted Category')

@section('content')

    {{-- {{ $deletedCategory }} --}}

    <h1>Deleted Category List</h1>

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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedCategory as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="category-restore/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
