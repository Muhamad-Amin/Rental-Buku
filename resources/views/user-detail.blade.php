@extends('layouts.mainlayout')

@section('title', 'Detail Users')

@section('content')

    <h1>Detail User</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-info mx-3">Apperove User</a>
        @endif
        <a href="/users" class="btn btn-primary">Back</a>
    </div>

    @if (Session('status'))
        <div class="alert alert-success my-5" role="alert">
            {{ Session('status') }}
        </div>
    @endif

    <div class="my-5 w-25">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="" id="" rows="5" class="form-control" style="resize: none;" readonly>{{ $user->address }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>

    </div>

    <div class="mt-5">
        <h2>User's Rent Log</h2>
        <x-rent-log-table :rentLog="$rent_logs"></x-rent-log-table>
    </div>

@endsection
