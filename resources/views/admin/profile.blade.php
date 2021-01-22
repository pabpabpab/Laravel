@extends('layouts.admin')

@section('title')
    {{__('profile.title')}}
@endsection

@section('content')
    <h1 style='margin: 30px 0 15px 0;'>{{__('profile.title')}}</h1>


    <table>
        <tr style="vertical-align:top;">
            <td style="width:300px;">

                <form action='{{route('admin::users::save')}}' method='post'>
                    @csrf

                    <label for="name">{{__('profile.name')}}</label><br>
                    <input type='text' name='name' id='name'
                           value="{{$user->name}}"
                           @error('name')style="border:2px solid #c06000;"@enderror required autofocus><br>
                    @error('name')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror


                    <label for="email">{{__('profile.email')}}</label><br>
                    <input type='email' name='email' id='email'
                           value="{{$user->email}}"
                           @error('email')style="border:2px solid #c06000;"@enderror required><br>
                    @error('email')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror

                    <label for="new_password">{{__('profile.new_password')}}</label><br>
                    <input type='password' name='new_password' id='password'
                           @error('new_password')style="border:2px solid #c06000;"@enderror><br>
                    @error('new_password')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror


                    <label for="current_password">{{__('profile.current_password')}}</label><br>
                    <input type='password' name='current_password' id='current_password'
                           @error('current_password')style="border:2px solid #c06000;"@enderror required><br>
                    @error('current_password')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror

                    <button type="submit" name='submit' style="padding:10px 25px;margin:10px 0;">
                        {{ __('profile.save') }}
                    </button>
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

                @php
                   $saveResult = session('saveResult');
                @endphp
                @isset($saveResult)
                   @if($saveResult)
                       {{__('profile.success')}}
                   @else
                       {{__('profile.fatal_error')}}
                   @endif
                @endisset
            </td>

        </tr>
    </table>
@endsection
