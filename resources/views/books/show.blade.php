@extends('layouts.master')

@section('title')
    Show book: {{$title}}
@endsection

@push('head')
    <link href="/css/books/show.css" rel="stylesheet">
@endpush

@section('content')
    @if($title)
        <h1>Show book: {{$title}}</h1>
    @else
        <h1>No book chosen</h1>
    @endif
@endsection

@push('body')
    <script src="/js/books/show.js"></script>
@endpush
