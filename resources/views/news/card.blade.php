@extends('layouts.main')

@section('title')
    @parent - {{$news->title}}
@endsection

@section('content')
<h1>{{$news->title}}</h1>
<p>{{$news->about}}</p>
<p>{{$news->content}}</p>
@endsection
