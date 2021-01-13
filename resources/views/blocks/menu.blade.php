<div class="menu">
    @foreach($menu as $item)
        <a href="{{route($item['alias'])}}" class="header_link">
            {{$item['title']}}
        </a>
    @endforeach
</div>
