@extends('layouts.main')

@section('title')
    @parent - news categories
@endsection

@section('content')
    <h1>News categories</h1>
    @foreach ($categories as $category)
        @php
          $url = route('news::category', ['categoryId' => $category->id, 'topic' => strtolower($category->name)]);
        @endphp
        <div><a href='{{$url}}'>{{$category->name}}</a></div>
    @endforeach
@endsection
