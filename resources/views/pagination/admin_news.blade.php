<div style='margin:0 0 50px 0;'>
    Pages:
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        @if ($paginator->currentPage() === $i)
            <span style="margin:0 10px;">
                    {{ $i }}
                </span>
        @else
            <a href='{{ $paginator->url($i) }}' style="margin:0 10px;">
                {{ $i }}
            </a>
        @endif
    @endfor
</div>
