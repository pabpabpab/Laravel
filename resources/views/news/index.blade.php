@extends('layouts.main')

@section('title')
    @parent - news categories
@endsection

@section('content')
    <h1>News categories</h1>
    @foreach ($categories as $topic => $value)
        @php
          $url = route('news::category', ['topic' => $topic]);
        @endphp
        <div><a href='{{$url}}'>{{$value}}</a></div>
    @endforeach
@endsection
