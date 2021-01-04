@extends('layouts.admin')

@section('title')
    Admin authorization
@endsection

@section('content')
    <h1>Authorization</h1>
    <form action='{{route('admin::news::login')}}' method='post'>
        @csrf
        Login<br>
        <input type='email' name='login'><br>
        Password<br>
        <input type='password' name='password'><br>
        <input type='submit' name='submit'>
    </form>
@endsection
