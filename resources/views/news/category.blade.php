@extends('layouts.main')

@section('title')
    @parent - {{ucfirst($topic)}} category
@endsection

@section('content')
    <h1>{{ucfirst($topic)}}</h1>
    <div style='margin-bottom:50px;'>
    @forelse ($list as $id => $item)
        @php
          $kebabTitle = implode('-', explode(' ', strtolower($item['title'])));
            $url = route('news::card', ['topic' => $topic, 'id' => $id, 'title' => $kebabTitle]);
        @endphp
        <div>
            <a href='{{$url}}'>{{$item['title']}}</a>
            <p style='margin:0 0 30px 0;padding:0;'>{{$item['about']}}</p>
        </div>
    @empty
        <p>Нет новостей</p>
    @endforelse
</div>
@endsection
