@extends('layouts.admin')

@section('title')
    {{__('login.title')}}
@endsection

@section('content')
    <h1>{{__('login.title')}}</h1>


    <table>
        <tr style="vertical-align:top;">
            <td style="width:300px;">

                <form action='{{route('authenticate')}}' method='post'>
                    @csrf


                    <label for="email">{{__('login.email')}}</label><br>
                    <input type='email' name='email' id='email'
                           value="{{old('email')}}"
                           @error('email')style="border:2px solid #c06000;"@enderror required><br>
                    @error('email')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror


                    <label for="password">{{__('login.password')}}</label><br>
                    <input type='password' name='password' id='password'
                           value="{{old('password')}}"
                           @error('password')style="border:2px solid #c06000;"@enderror required><br>
                    @error('password')
                    <div style="font-size:13px;color:#c06000;">{{ $message }}</div>
                    @enderror


                    <input type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('login.remember_me') }}
                    </label><br>

                    <button type="submit" name='submit' style="padding:10px 25px;margin:10px 0;">
                        {{ __('login.title') }}
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
            </td>

        </tr>
    </table>
@endsection
