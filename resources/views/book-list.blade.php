@extends('layouts.mainlayout')

@section('title', 'Books List')

@section('content')

    <form action="" method="GET">
        <div class="row">

            <div class="col-12 col-sm-6 mb-3">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-sm-6 mb-3">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                        placeholder="Search Book's Title">
                    <button class="btn btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </form>

    <div class="my-5">
        <div class="row">

            @foreach ($books as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        @if ($item->cover)
                            <img src="{{ asset('storage/cover/' . $item->cover) }}" class="card-img-top"
                                alt="{{ $item->title }}" draggable="false">
                        @else
                            <img src="{{ asset('image/notFound.jpeg') }}" alt="Not Found" draggable="false">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_code }}</h5>
                            <p class="card-text">
                                {{ $item->title }}
                            </p>
                            <p
                                class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
