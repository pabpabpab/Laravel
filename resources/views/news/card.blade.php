@extends('layouts.main')

@section('title')
    @parent - {{$news->title}}
@endsection

@section('content')
<h1>{{$news->title}}</h1>
<p>{{$news->about}}</p>
<p>{{$news->content}}</p>

@php
    $kebabTopic = implode('-', explode(' ', strtolower($category->name)));
    $categoryUrl = route('news::category', [
        'categoryId' => $category->id,
        'topic' => $kebabTopic
    ]);
@endphp
Category: <a href='{{$categoryUrl}}'>{{$category->name}}</a>
@endsection
