@extends('layouts.admin')

@section('title')
    Admin authorization
@endsection

@section('content')

    <h1>Authorization</h1>

    <table>
        <tr style="vertical-align:top;">

         <td style="width:300px;">

              <form action='{{route('admin::news::login')}}' method='post'>
                  @csrf

                  Login<br>
                  <input type='email' name='login'
                         value='{{ old('login') }}'
                         @error('login')style="border:2px solid #c06000;"@enderror><br>

                  Password<br>
                  <input type='password' name='password'
                         @error('password')style="border:2px solid #c06000;"@enderror><br>

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
