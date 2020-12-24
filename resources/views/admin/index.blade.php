@extends('layouts.admin')

@section('title')
    Admin index
@endsection


@section('content')
    @if (old('login'))
        <div>Welcome {{ old('login') }}! (old)</div>
    @elseif (session('login'))
        <div>Hi {{ session('login') }}! (session)</div>
    @else
        <div>Welcome to admin panel!</div>
        <a href="{{ route('admin::news::auth') }}">Log in</a>
    @endif
@endsection
