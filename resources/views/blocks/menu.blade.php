@php
   $menu = $isAdminMenu ? __('topMenu.admin') : __('topMenu.common');
@endphp
<div class="menu">
    @foreach($menu as $item)
        @if ($item['role'] === 'admin')
            @if(!session('admin')) @continue @endif
        @endif

        @if ($item['auth'])
                @guest @continue @endguest
        @endif

        <a href="{{route($item['alias'])}}" class="header_link">
            {{$item['title']}}
        </a>
    @endforeach


    @guest()
        <a href="{{route(__('topMenu.login.alias'))}}" class="header_link">
            {{__('topMenu.login.title')}}
        </a>

        <a href="{{route(__('topMenu.loginVk.alias'), ['socialNetwork' => 'vkontakte'])}}" class="header_link">
            {{__('topMenu.loginVk.title')}}
        </a>
        <a href="{{route(__('topMenu.loginYandex.alias'), ['socialNetwork' => 'yandex'])}}" class="header_link">
             {{__('topMenu.loginYandex.title')}}
        </a>

        <a href="{{route(__('topMenu.register.alias'))}}" class="header_link">
            {{__('topMenu.register.title')}}
        </a>
    @endguest

    @auth()
       <a href="{{route(__('topMenu.myprofile.alias'))}}" class="header_link">
            {{__('topMenu.myprofile.title')}} {{session('username')}}
       </a>
       <a href="{{route(__('topMenu.logout.alias'))}}" class="header_link">
            {{__('topMenu.logout.title')}}
        </a>
    @endauth

    @foreach(__('locale.languages') as $lang => $name)
       <a href="{{route('locale::set', ['locale' => $lang])}}" class="header_link">
           {{$name}}
       </a>
    @endforeach
</div>
