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
       $editResult = session('editResult');
       session()->forget('editResult');
       $editNewsId = session('editNewsId');
       session()->forget('editNewsId');
       $deleteResult = session('deleteResult');
       session()->forget('deleteResult');
       $deleteNewsId = session('deleteNewsId');
       session()->forget('deleteNewsId');
    @endphp

    @isset($saveResult)
        <div style="text-align:center;margin:30px 0;">
        @if ($saveResult)
            News added successfully!
        @else
            The news is not added!
        @endif
        </div>
    @endisset

    @isset($editResult)
        <div style="text-align:center;margin:30px 0;">
            @if ($editResult)
                News {{ $editNewsId }} saved successfully!
            @else
                The {{ $editNewsId }} news is not saved!
            @endif
        </div>
    @endisset

    @isset($deleteResult)
        <div style="text-align:center;margin:30px 0;">
            @if ($deleteResult)
                News {{ $deleteNewsId }} deleted successfully!
            @else
                The {{ $deleteNewsId }} news is not deleted!
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

    {{-- Pagination --}}
    <div style='margin:0 0 50px 0;'>
        Pages:
        @for ($i = 1; $i <= $list->lastPage(); $i++)
            @if ($list->currentPage() === $i)
                <span style="margin:0 10px;">{{ $i }}</span>
            @else
                <a href='{{ $list->url($i) }}' style="margin:0 10px;">{{ $i }}</a>
            @endif
        @endfor
    </div>
@endsection
