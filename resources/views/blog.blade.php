@extends('layouts.nav')

@section('page-content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
   @livewire('blog-posts')
@endsection


