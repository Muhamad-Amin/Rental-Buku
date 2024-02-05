@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
    <div class="my-5">
        <h1>Your Rent Log</h1>
        <x-rent-log-table :rentLog="$rent_logs"></x-rent-log-table>
    </div>
@endsection
