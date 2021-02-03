@extends('layouts.admin')

@section('title')
Admin index
@endsection

@section('content')

    @php
       $saveResult = session('saveResult');
       $deleteResult = session('deleteResult');
       $saveXmlResult = session('saveXmlResult');
    @endphp

    @isset($saveXmlResult)
        <div style="text-align:center;margin:30px 0;">
            {{$saveXmlResult}}
        </div>
    @endisset

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
                  @can('edit news') <a href='{{$editUrl}}'>Edit</a> @endcan
                  @can('delete news') <a href='{{$deleteUrl}}' style='margin:0 20px;'>Delete</a> @endcan
              </p>
           </div>
        @empty
           <p>Нет новостей</p>
        @endforelse
    </div>

    {{ $list->links('pagination.admin_news') }}
@endsection
