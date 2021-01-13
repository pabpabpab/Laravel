@extends('layouts.admin')

@section('title')
    Admin / Create news
@endsection

@section('content')
    @if ($news->id)
        <h1>Edit news</h1>
    @else
        <h1>Create news</h1>
    @endif

    <table>
        <tr style="vertical-align:top;">
            <td style="width:300px;">

                <form action='{{route('admin::news::save')}}' method='post'>
                    @csrf

                    @if ($news->id > 0)
                        <input type="hidden" name="id" value="{{ $news->id }}">
                    @endif

                    @php
                        $category_id = old('category_id') ? old('category_id') : $news->category_id
                    @endphp
                    Category<br>
                    <select name='category_id' @error('category_id')style="border:2px solid #c06000;"@enderror>
                    @foreach ($categories as $category)
                        <option value='{{$category->id}}'
                            @if ($category_id == $category->id) selected @endif>
                            {{$category->name}}
                        </option>
                    @endforeach
                    </select><br>
                    @error('category_id')
                       <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror

                    @php
                        $title = old('title') ? old('title') : $news->title
                    @endphp
                    Title<br>
                    <input type='text' name='title'
                           value="{{$title}}"
                           @error('title')style="border:2px solid #c06000;"@enderror><br>
                    @error('title')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror

                    @php
                        $about = old('about') ? old('about') : $news->about
                    @endphp
                    About<br>
                    <input type='text' name='about'
                           value="{{$about}}"
                           @error('about')style="border:2px solid #c06000;"@enderror><br>
                    @error('about')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror

                    @php
                        $content = old('content') ? old('content') : $news->content
                    @endphp
                    Text<br>
                    <textarea name='content' style="width:210px;height:100px;@error('content')border:2px solid #c06000;@enderror"></textarea>
                    <script>
                        document.querySelector(`[name='content']`).value = "{{$content}}";
                    </script>
                    @error('content')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror
                    <br>

                    <input type='submit' name='submit'>
                </form>

            </td>


            <td style="padding:0 0 0 150px;">
                @if ($errors->any())
                    <ul style="color:#c06000;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>

        </tr>
    </table>
@endsection
