@extends('layouts.admin')

@section('title')
Admin / Create news
@endsection


@section('content')
    @if (old('title'))
        <h1>Edit news</h1>
    @else
        <h1>Create news</h1>
    @endif

    <form action='{{route('admin::news::add')}}' method='post'>
        @csrf
        Title<br>
        <input type='text' name='title' value="{{ old('title') }}"><br>
        About<br>
        <input type='text' name='about' value="{{ old('about') }}"><br>
        Text<br>
        <textarea name='text'>{{ old('text') }}</textarea><br>
        <input type='submit' name='submit'>
    </form>
@endsection
