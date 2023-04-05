@extends('layouts.base')

@section('title')
@endsection
@section('content')
<div>
    <input wire:model="query" type="search" placeholder="Search...">
    <button wire:click="search">Search</button>
    @if (!is_null($posts) && $posts->count())
    <ul>
        @foreach ($posts as $result)
            <li>{{ $result->title }}</li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif



@endsection