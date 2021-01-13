@extends('layouts.admin')

@section('title')
Admin index
@endsection

@section('content')

    @if (session('login'))
        <div>Hi {{ session('login') }}!</div>
    @else
        <div>Welcome to admin panel!</div>
        <a href="{{ route('admin::news::auth') }}">Log in</a>
    @endif

    @php
       $saveResult = session('saveResult');
       session()->forget('saveResult');
       $deleteResult = session('deleteResult');
       session()->forget('deleteResult');
    @endphp

    @isset($saveResult)
        <div style="text-align:center;margin:30px 0;">
            @if (!$saveResult['oldId'])
                @if ($saveResult['result']) News added successfully! @else The news is not added! @endif
            @else
                @if ($saveResult['result']) News {{ $saveResult['oldId'] }} saved successfully! @else The {{ $saveResult['oldId'] }} news is not saved! @endif
            @endif
        </div>
    @endisset

    @isset($deleteResult)
        <div style="text-align:center;margin:30px 0;">
            @if ($deleteResult['result'])
                News {{ $deleteResult['oldId'] }} deleted successfully!
            @else
                The {{ $deleteResult['oldId'] }} news is not deleted!
            @endif
        </div>
    @endisset

    <div style='margin:50px 0;'>
        @forelse ($list as $news)
           @php
               $kebabTopic = implode('-', explode(' ', strtolower($news->category_name)));
               $kebabTitle = implode('-', explode(' ', strtolower($news->title)));
               $newsUrl = route('news::card', [
                   'categoryId' => $news->category_id,
                   'topic' => $kebabTopic,
                   'id' => $news->id,
                   'title' => $kebabTitle
               ]);

               $categoryUrl = route('news::category', [
                   'categoryId' => $news->category_id,
                   'topic' => $kebabTopic
               ]);

               $editUrl = route('admin::news::edit', ['id' => $news->id]);
               $deleteUrl = route('admin::news::delete', ['id' => $news->id]);
           @endphp

           <div>
              <p><a href='{{$newsUrl}}'>{{$news->title}}</a></p>
              <p>{{$news->about}}</p>
              <p>
                  Category: <a href='{{$categoryUrl}}'>{{$news->category_name}}</a>
              </p>
              <p style='margin:0 0 30px 0;'>
                  <a href='{{$editUrl}}'>Edit</a>
                  <a href='{{$deleteUrl}}' style='margin:0 20px;'>Delete</a>
              </p>
           </div>
        @empty
           <p>Нет новостей</p>
        @endforelse
    </div>

    {{ $list->links('pagination.admin_news') }}
@endsection
