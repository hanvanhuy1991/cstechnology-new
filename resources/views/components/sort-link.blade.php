<a
    href="{{ query_sort($name) }}"
    class=""
>
    {{ $slot ?? '' }}

    @if(query_sort_active($name))
        <i class="icon-sort-amount-asc"></i>
    @elseif(query_sort_active('-' . $name))
        <i class="icon-sort-amount-desc"></i>
    @else
        <span class="text-grey">
            <i class="icon-sort"></i>
        </span>
    @endif
</a>
