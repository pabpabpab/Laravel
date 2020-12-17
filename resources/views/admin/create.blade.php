@extends('layouts.admin')

@section('title')
    Admin / Create news
@endsection


@section('content')
    <h1>Create news</h1>
    <form action='/admin/news/add' method='post'>
        Title<br>
        <input type='text' name='title'><br>
        About<br>
        <input type='text' name='about'><br>
        Text<br>
        <textarea name='text'></textarea><br>
        <input type='submit' name='submit'>
    </form>
@endsection
