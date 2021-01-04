@extends('layouts.admin')

@section('title')
    Admin / Create news
@endsection

@section('content')
    @if ($news->id)
        <h1>Edit news</h1>
    @else
        <h1>Create news</h1>
    @endif

    <form action='{{route('admin::news::save')}}' method='post'>
        @csrf
        @if ($news->id > 0)
            <input type="hidden" name="id" value="{{ $news->id }}">
        @endif

        Category<br>
        <select name='category_id'>
        @foreach ($categories as $category)
            <option value='{{$category->id}}'
            @if ($news->category_id == $category->id) selected @endif>
                {{$category->name}}
            </option>
        @endforeach
        </select><br>

        Title<br>
        <input type='text' name='title' value="{{ $news->title }}"><br>
        About<br>
        <input type='text' name='about' value="{{ $news->about }}"><br>
        Text<br>
        <textarea name='content'>{{ $news->content }}</textarea><br>
        <input type='submit' name='submit'>
    </form>
@endsection
